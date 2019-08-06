<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use App\Project;
use Auth;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;

class DashboardController extends Controller
{
    protected $projects;
    protected $tasks;
    
    //
    public function __construct(ProjectRepository $projects, TaskRepository $tasks)
    {
        $this->projects = $projects;
        $this->tasks = $tasks;
    }
    /**
     * Display the overall statics of the system
     *
     * @param  \App\Projects $project
     * @return \Illuminate\View\View
     */
    
    public function index()
    {
        

        $projectCount = $this->projects->userProjectsCount(Auth::user());

        $onProjectCount = $this->projects->memberinProjects(Auth::user());

        //$userCount = User::count();

        $taskCount = $this->tasks->assignedTo(Auth::user())->count();

        $incompleteCount = $this->tasks->incompleteCount(Auth::user());

        $overdueCount = $this->tasks->overdueCount();

        return view ('dashboard', [
            'onProjectCount' => $onProjectCount,
            'taskCount' => $taskCount,
            'incompleteCount' => $incompleteCount,
            'projectCount' => $projectCount,
            'overdueCount' => $overdueCount
        ]);
        
    }
}
