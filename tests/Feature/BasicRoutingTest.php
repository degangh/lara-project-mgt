<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicRoutingTest extends TestCase
{
    use RefreshDatabase;
    function setup()
    {
        parent::setup();
        \Artisan::call('db:seed');

    }
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
    /* visit uri without login

    */
    public function testProjectNoLogin()
    {
        $response = $this->get('/projects');

        $response->assertStatus(302);
    }

    /* visit uri without login

    */
    public function testOpenProjectNoLogin()
    {
        $response = $this->get('/projects/1');

        $response->assertStatus(302);
    }

    /* visit uri without login

    */
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

    /* open a project belong to a specific user 

    */
    public function testSeeNewProjectButton()
    {
        $user = User::first();
        $project = $user->projects()->first();
        \Auth::login($user);
        $response = $this->actingAs($user)->get('/projects');
        $response->assertSee(__('project.new_project'));
    }

    /* open a project belong to a specific user 

    */
    public function testSeeMemberButton()
    {
        $user = User::first();
        $project = $user->projects()->first();
        \Auth::login($user);
        $response = $this->actingAs($user)->get('/projects/'.$project->id);
        $response->assertSee(__("project.add_member"));
    }

    /* open a project belong to a specific user 

    */
    public function testSeeTaskButton()
    {
        $user = User::first();
        $project = $user->projects()->first();
        \Auth::login($user);
        $response = $this->actingAs($user)->get('/projects/'.$project->id);
        $response->assertSee(__("project.add_task"));
    }

    /* @test */
    public function testNotificationInboxWithUser()
    {
        $user = User::first();
        
        $response = $this->actingAs($user)->get('/notification/inbox');
        $response->assertStatus(200);
    }

    /* test new notification json */
    public function testNewNotificationJson()
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/notification/new');
        $response->assertStatus(200);
    }


}
