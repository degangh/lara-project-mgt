<?php
namespace App\Repositories;

use App\User;
use App\Project;
use Auth;

class ProjectRepository
{
    public function forUser(User $user)
    {
        return Project::where('owner_id', $user->id)
                        ->orderBy('created_at', 'asc')
                        ->get();
    }

    public function members(Project $project)
    {
        return Project::find($project->id)->members();
    }

    public function tasks(Project $project)
    {
        return $project->tasks;
    }

    public function userProjectsCount(User $user)
    {
        return Project::where('owner_id',Auth::user()->id)->count();
    }
}