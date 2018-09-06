<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use App\Project;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        

        $projectCount = Project::count();

        

        $userCount = User::count();

        $taskCount = Task::count();

        $incompleteCount = Task::where('is_complete', 0)->count();

        $overdueCount = Task::where('is_complete', 0)->where('due_time', '<', date("Y-m-d"))->count();

        return view ('dashboard', [
            'userCount' => $userCount,
            'taskCount' => $taskCount,
            'incompleteCount' => $incompleteCount,
            'projectCount' => $projectCount,
            'overdueCount' => $overdueCount
        ]);
        
    }
}
