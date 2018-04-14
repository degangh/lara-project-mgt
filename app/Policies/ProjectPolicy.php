<?php

namespace App\Policies;

use App\User;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show(User $user,Project $project)
    {
       
        return $user->id === $project->owner_id;
    }

    public function edit(User $user, Project $project)
    {
        return $user->id === $project->owner_id;
    }
}
