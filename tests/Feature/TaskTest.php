<?php

namespace Tests\Feature;


use App\Project;
use App\Task;
use App\User;
use \Crypt;
use Session;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /*

    */
    public function testTaskCreation()
    {
        $user = User::first();
        $project = $user->projects()->first();
        $task = factory(Task::class)->make();
        var_dump($task);
        $response = $this->actingAs($user)->post(route('tasks.store'), [
            'project_id' => Crypt::encrypt($project->id),
            'due_date' => $task->due_time,
            'name' => $task->name,
            'user_id' => $user->id
        ]);
        var_dump(Session::get('errors'));
        $response->assertStatus(302);
        
        $response->assertSessionHas('success', 'Task Saved Successfully');

    }

    /*
    */
    public function testTaskComplete()
    {

    }
}
