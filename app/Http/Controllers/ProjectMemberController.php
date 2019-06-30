<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectMember;

use App\Project;
use App\User;
use Session;

class ProjectMemberController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');   
    }

    /**
     * Add memebers into a project
     *
     * @param  \App\Projects  $project
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, StoreProjectMember $request)
    {
        $validated = $request->validated();        
        //detach all users in the first place
        $project->members()->detach();
        
        //dd($request->members);
        foreach ($validated['members'] as $member)
        {
            $ProjectMember = User::find($member);
            $project->members()->save($ProjectMember);
        }

        Session::flash('success', __('project.member_success'));
        return redirect(url("/projects/".$project->id)); 

    }
}
