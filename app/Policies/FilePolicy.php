<?php

namespace App\Policies;

use App\User;
use App\File;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
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
    
    public function download(User $user, File $file)
    {
        return $user == $file->user || $file->project->members->contains('id', $user->id);
    }
}
