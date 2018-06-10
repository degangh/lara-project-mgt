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
    
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProjectCreation()
    {
        $user = factory(User::class)->create();
        \Auth::login($user);
        $project = factory(Project::class)->make();
        $response = $this->actingAs($user)
        ->post(route('projects.store'), [
            'owner_id' => $user->id,
            'name' => $project->name,
            'desc' => $project->desc
        ]);
        $response->assertSessionHas("success","Project Created Successfully");

    }
}
