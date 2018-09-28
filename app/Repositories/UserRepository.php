<?php
namespace App\Repositories;

use App\User;
use App\Project;
use App\Task;

class UserRepository
{
    public function all()
    {
        return User::all();
    }
}