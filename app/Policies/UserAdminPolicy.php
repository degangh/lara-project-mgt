<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserAdminPolicy
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

    /**
     * Determine whether the current user can manage other users.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function edit(User $user)
    {
         return $user->is_admin == 1;
    }
}
