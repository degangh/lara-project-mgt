<?php
namespace App\Repositories;

use App\User;
use App\Project;
use App\Task;

class TaskRepository
{
    public function incompleteCount(User $user)
    {
        return Task::where('is_complete', 0)->where('assignee', $user->id)->count();
    }

    public function overdueCount()
    {
        return Task::where('is_complete', 0)->where('due_time', '<', date("Y-m-d"))->count();
    }

    public function allCount()
    {
        return Task::count();
    }

    public function assignedTo(User $user)
    {
        return $user->assignedTasks()->orderBy('due_time', 'desc')->get();
    }

    public function find($id)
    {
        return Task::find($id);
    }
}