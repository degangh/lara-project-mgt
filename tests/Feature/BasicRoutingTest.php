<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicRoutingTest extends TestCase
{
    /**
     * A basic test example. No login
     *
     * @return void
     */
    public function testUsersNoLogin()
    {
        $response = $this->get('/users');

        $response->assertStatus(302);
    }

    public function testProjectNoLogin()
    {
        $response = $this->get('/projects');

        $response->assertStatus(302);
    }

    public function testOpenProjectNoLogin()
    {
        $response = $this->get('/projects/1');

        $response->assertStatus(302);
    }

    public function testProjectWithUser()
    {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->get('/projects');
        $response->assertStatus(200);
    }

    /* user list

    */
    public function testUserWithUser()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/projects');

        $response->assertStatus(200);
    }

    /* open a project belong to a specific user 

    */
    public function testOpenProjectWithUser()
    {
        $user = User::first();
        $project = $user->projects()->first();
        \Auth::login($user);
        $response = $this->actingAs($user)->get('/projects/'.$project->id);
        $response->assertStatus(200);
    }




}
