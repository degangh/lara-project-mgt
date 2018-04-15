<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Project;
use Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        
        return view('project', [
            'projects' => $this->projects->forUser($request->user())
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $project = $request->user()->projects()->create([
            "name" => $request->name,
        ]);
        Session::flash('message', 'Project Created Successfully');
        return redirect(url("/projects"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
  
        $this->authorize('show', $project);
        
        return view('tasks', [
            'tasks' => $project->tasks,
            'project' => $project
            ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        //
        $current_project=Project::find($id);

        $this->authorize('edit', $current_project);
        
        $projects = $this->projects->forUser($request->user());
        return view('project_edit', [
            'projects' => $projects,
            'current_project' =>$current_project
            ]);
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
        $project->name = $request->name;
        $project->save();
        Session::flash('message', 'Project Saved Successfully');
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
}
