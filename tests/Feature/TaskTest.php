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
    use RefreshDatabase;
    function setup()
    {
        parent::setup();
        \Artisan::call('db:seed');

    }
    
    /*

    */
    public function testTaskCreation()
    {
        $user = User::first();
        $project = $user->projects()->first();
        $task = factory(Task::class)->make();

        $response = $this->actingAs($user)->post(route('tasks.store'), [
            'project_id' => Crypt::encrypt($project->id),
            'due_date' => $task->due_time,
            'name' => $task->name,
            'user_id' => $user->id,
            'assignee' => $user->id
        ]);

        $response->assertStatus(302);
        
        $response->assertSessionHas('success', __('task.save_success'));

    }

    /*
    */
    public function testTaskComplete()
    {
        $user = User::first();
        $project = $user->projects()->first();
        
        $task = Task::where('user_id', $user->id)->where('is_complete', 0)->first();

        $response = $this->actingAs($user)->patch(url('tasks/'.$task->id.'/complete'));

        $response->assertStatus(302);
        
        $response->assertSessionHas('success', __('task.complete_success'));

        //assert the task statu is updated
        $this->assertDatabaseHas('tasks', ['id'=>$task->id, 'is_complete' => 1]);



        //todo
        //$this->assertDatabaseHas('notification', []);
    }
}
