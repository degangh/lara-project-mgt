<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Storage;
use App\Project;
use App\User;
use App\File;
use Session;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    protected $projects;
    
    
     public function __construct(ProjectRepository $projects)
     {
         $this->middleware('auth');
         $this->projects = $projects;
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
    public function store(Request $request)
    {
        $messages  = [
            "desc.required" => "Please describe this project"
        ];
        
        $request->validate([
            "name" => "required",
            "desc" => "required"
        ], $messages);
        
        $project = $request->user()->projects()->create([
            "name" => $request->name,
            "desc" => $request->desc
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
        $users = User::all()->except($project->owner_id)->sortBy('name');
        $this->authorize('show', $project);
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
        /*
        $current_project=Project::find($id);

        $this->authorize('edit', $current_project);
        
        $projects = $this->projects->forUser($request->user());
        return view('project_edit', [
            'projects' => $projects,
            'current_project' =>$current_project
            ]);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        
        $this->authorize('edit', $project);

        $project->name = $request->name;
        $project->desc = $request->desc;
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

    public function file(Request $request, Project $project)
    {
        $this->authorize('edit', $project);

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
