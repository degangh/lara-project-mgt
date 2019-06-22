<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use App\User;
use Auth;
use App\Repositories\TaskRepository;

use \Crypt;
use Session;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Events\OnTaskComplete;
use App\Events\OnTaskAssigned;

class TaskController extends Controller
{
    protected $tasks;
    
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth'); 
        $this->tasks = $tasks;  
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
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
    public function store(StoreTask $request)
    {
        
        
        $validated = $request->validated();
        
        
        $project_id = Crypt::decrypt($validated['project_id']);

        $project = Project::find($project_id);
        $this->authorize('show', $project);

        
        
        $task = $request->user()->tasks()->create([
            "name" => $validated['name'],
            "project_id" => $project_id,
            "user_id" => $request->user()->id,
            "due_time" => $validated['due_date'],
            "assignee" => $validated['assignee']
        ]);

        event(new OnTaskAssigned($task));
        Session::flash('success', __('task.save_success'));
        return redirect(url("/projects/".Crypt::decrypt($request->project_id)));   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }

    /**
     * Mark task as completed.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function complete(Task $task)
    {
        $this->authorize("complete", $task);
        
        $task->is_complete = 1;
        $task->save();
        Session::flash('success', __('task.complete_success'));
        event(new OnTaskComplete($task));
        return back();

    }

    /**
     * Return task assigned to current user
     * 
     * @param 
     * @return 
     */
    public function myTasks(Request $request)
    {
        $tasks = $this->tasks->assignedTo(Auth::user());

        return view('my_task', ['tasks' => $tasks]);

    }
}
