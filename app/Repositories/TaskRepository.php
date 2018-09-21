<?php
namespace App\Repositories;

use App\User;
use App\Project;
use App\Task;

class TaskRepository
{
    public function incompleteCount()
    {
        return Task::where('is_complete', 0)->count();
    }

    public function overdueCount()
    {
        return Task::where('is_complete', 0)->where('due_time', '<', date("Y-m-d"))->count();
    }

    public function allCount()
    {
        return Task::count();
    }
}