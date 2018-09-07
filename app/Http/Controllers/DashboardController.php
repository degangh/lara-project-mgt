<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use App\Project;
use Auth;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        

        $projectCount = Project::where('owner_id',Auth::user()->id)->count();

        $onProjectCount = User::find(Auth::user()->id)->onProjects->count();

        //$userCount = User::count();

        $taskCount = Task::count();

        $incompleteCount = Task::where('is_complete', 0)->count();

        $overdueCount = Task::where('is_complete', 0)->where('due_time', '<', date("Y-m-d"))->count();

        return view ('dashboard', [
            'userCount' => $onProjectCount,
            'taskCount' => $taskCount,
            'incompleteCount' => $incompleteCount,
            'projectCount' => $projectCount,
            'overdueCount' => $overdueCount
        ]);
        
    }
}
