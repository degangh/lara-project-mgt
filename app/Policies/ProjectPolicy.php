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
        $onProject = false;

        
        foreach ($project->members as $member)
        {
            if ($user->id == $member->id) $onProject = true;
        }
        
        return ( ($user->id === $project->user->id) || $onProject);
    }

    public function edit(User $user, Project $project)
    {
        return $user->id === $project->user->id;
    }
}
