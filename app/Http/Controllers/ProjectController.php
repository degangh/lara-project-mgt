<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;
use App\Project;
use App\User;
use App\File;
use Session;
use Auth;
use App\Http\Requests\StoreProject;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    protected $projects;
    protected $users;
    
    
     public function __construct(ProjectRepository $projects, UserRepository $users)
     {
         $this->projects = $projects;
         $this->users = $users;
     }

    
     public function index(Request $request)
    {
        //
        //current login user's project
        $myProjects = $this->projects->forUser($request->user());
    
        $memberProjects = Auth::user()->onProjects->sortBy("create_at");
    
        //merge 2 collections

        $projects = $myProjects->merge($memberProjects)->sortBy("create_at");
        return view('project', [
            'projects' => $projects
            ]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function store(StoreProject $request)
    {
        $validated = $request->validated();
        
        $project = $request->user()->projects()->create([
            'name' => $validated['name'],
            'desc' => $validated['desc']
        ]);
        
        //save project owner as a default member when creating the project
        //owner will not be saved to project_user
        //$project->members()->save($request->user());
        
        Session::flash('success', __('project.save_success'));
        return redirect(url("/projects"));
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        //prepare user list
        $users = $this->users->all()->get()->except($project->owner_id)->sortBy('name');
        try
        {
            $this->authorize('show', $project);
        }
        catch (\Exception $e)
        {
            abort('403', __('exception.projectReadNotAllowed'));
            //throw new \App\Exceptions\ResourceNotAllowedException('not allowed');
        }

        return view('tasks', [
            'tasks' => $this->projects->tasks($project),
            'project' => $project,
            'users' => $users
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProject $request, $id)
    {
        $project = $this->projects->findById($id);
        try
        {
            $this->authorize('edit', $project);
        }
        catch(\Exception $e)
        {
            abort('403', __('exception.projectEditNotAllowed'));
        }
        
        $validated = $request->validated();

        $project->name = $validated['name'];
        $project->desc = $validated['desc'];
        $project->save();
        Session::flash('success', __('project.save_success'));
        return redirect(url("/projects"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * list all projects regardless the users
     * @param null
     * @return \App\Projects
     *
    */
    public function all()
    {
        
    }

    /**
     * upload file to local storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Project  \App\Project
     * @return \Illuminate\Http\Response
     */

    public function file(Request $request, Project $project)
    {
        try
        {
            $this->authorize('edit', $project);
        }
        catch(\Exception $e)
        {
            abort('403', __('exception.projectFileNotAllowed'));
        }
        
        $uploadedFile = $request->file('attchement');
        
        $filename = $uploadedFile->getClientOriginalName();
        
        $path = Storage::putFileAs('upload', $request->file('attchement'), uniqid(). "-" .$filename);

        $file = $request->user()->files()->create([
            'original_name' => $filename,
            'path' => $path,
            'project_id' => $project->id
        ]);

        Session::flash('success', __('project.file_success', ['filename' => $filename]));
        return back();
    }

}
