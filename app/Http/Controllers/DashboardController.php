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
        echo 'dashboard'; //to do

        $projectCount = Project::count();

        echo $projectCount;

        $userCount = User::count();

        $taskCount = Task::count();

        $incompleteCount = Task::where('is_complete', 0)->count();

        echo ":" . $userCount . ":" . $taskCount . ":" . $incompleteCount;
        
    }
}
