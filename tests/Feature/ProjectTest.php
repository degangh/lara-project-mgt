<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;


use App\Project;
use App\Task;
use App\User;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    function setup()
    {
        parent::setup();
        \Artisan::call('db:seed');
        factory(User::class, 5)->create();

    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProjectCreation()
    {
        $user = factory(User::class)->create();
        $project = factory(Project::class)->make();
        $response = $this->actingAs($user)
        ->post(route('projects.store'), [
            'owner_id' => $user->id,
            'name' => $project->name,
            'desc' => $project->desc
        ]);
        $response->assertSessionHas("success",__("project.save_success"));

    }


    public function testProjectEdit()
    {
        $user = User::first();
        $project = $user->projects()->first();
        $response = $this->actingAs($user)->put(route("projects.update", ['id' => $project->id]), [
            'name' => $project->name,
            'desc' => $project->desc
        ]);

        $response->assertSessionHas("success",__("project.save_success"));
    }

    public function testProjectAddMember()
    {
        $user = User::first();
        $project = $user->projects()->first();
        $members = User::where("id", "!=", $user->id)->take(3)->get();
        $member_id = array();
        
        foreach($members as $member) {
           $member_id[] = $member->id;
        }



        $response = $this->actingAs($user)->post(url("projects/".$project->id."/members"), [
            "members" => $member_id
        ]);
        $response->assertStatus(302);
        $response->assertSessionHas("success",__("project.member_success"));
    }
}
