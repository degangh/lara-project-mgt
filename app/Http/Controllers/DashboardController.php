<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use App\Project;

class DashboardController extends Controller
{
    //
    public function index()
    {
        

        $projectCount = Project::count();

        

        $userCount = User::count();

        $taskCount = Task::count();

        $incompleteCount = Task::where('is_complete', 0)->count();

        return view ('dashboard', [
            'userCount' => $userCount,
            'taskCount' => $taskCount,
            'incompleteCount' => $incompleteCount,
            'projectCount' => $projectCount
        ]);
        
    }
}
