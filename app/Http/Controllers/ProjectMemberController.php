<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\User;

class ProjectMemberController extends Controller
{
    //
    public function store(Project $project, Request $request)
    {
        //dd($request->members);
        foreach ($request->members as $member)
        {
            $ProjectMember = User::find($member);
            $project->members()->save($ProjectMember);
        }

    }
}
