<?php
namespace App\Repositories;

use App\User;
use App\Project;

class ProjectRepository
{
    public function forUser(User $user)
    {
        return Project::where('owner_id', $user->id)
                        ->orderBy('created_at', 'asc')
                        ->get();
    }
}