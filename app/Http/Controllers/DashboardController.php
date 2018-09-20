<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use App\Project;
use Auth;
use App\Repositories\ProjectRepository;

class DashboardController extends Controller
{
    protected $projects;
    
    //
    public function __construct(ProjectRepository $projects)
    {
        $this->middleware('auth');
        $this->projects = $projects;
    }
    
    
    public function index()
    {
        

        $projectCount = $this->projects->userProjectsCount(Auth::user());

        $onProjectCount = User::find(Auth::user()->id)->onProjects->count();

        //$userCount = User::count();

        $taskCount = Task::count();

        $incompleteCount = Task::where('is_complete', 0)->count();

        $overdueCount = Task::where('is_complete', 0)->where('due_time', '<', date("Y-m-d"))->count();

        return view ('dashboard', [
            'onProjectCount' => $onProjectCount,
            'taskCount' => $taskCount,
            'incompleteCount' => $incompleteCount,
            'projectCount' => $projectCount,
            'overdueCount' => $overdueCount
        ]);
        
    }
}
