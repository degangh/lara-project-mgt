<?php
namespace App\Repositories;

use App\User;
use App\Project;
use App\Task;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserRepository
{
    public function all()
    {
        return User::where('id', '>' , 0);
    }

    public function create($request)
    {
        User::create([
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => bcrypt($request['password'])
        ]);
    }
}