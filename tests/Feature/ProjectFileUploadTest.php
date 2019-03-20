<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Project;
use App\Task;
use App\User;

class ProjectFileUploadTest extends TestCase
{
    use RefreshDatabase;
    function setup()
    {
        parent::setup();
        \Artisan::call('db:seed');

    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOwnerUploadFile()
    {
        Storage::fake('upload');
        $file = UploadedFile::fake()->image('test.jpg');
        $project = Project::first();
        $user = User::first();

        $response = $this->actingAs($user)->post('/projects/'.$project->id.'/file', [
            'attchement' => $file
        ]);
        $response->assertStatus(302);
        $response->assertSessionHas("success",__("project.file_success",  ['filename' => $file->name]));

        //Storage::disk('upload')->assertExists($file->hashName());

    }

    public function testMemberCannotUploadFile()
    {
        Storage::fake('upload');
        $file = UploadedFile::fake()->image('test.jpg');
        $project = Project::first();
        $user = User::first();

        $member_id = array();
        $member_id[] = User::find(2)->id;
        $this->actingAs($user)->post(url("projects/".$project->id."/members"), [
            "members" => $member_id
        ]);

        $member = User::find(2);

        $response = $this->actingAs($member)->post('/projects/'.$project->id.'/file', [
            'attchement' => $file
        ]);
        $response->assertStatus(403);
    }

    public function testOutsiderUploadFile()
    {
        Storage::fake('upload');
        $file = UploadedFile::fake()->image('test.jpg');
        $project = Project::first();

        $user = $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/projects/'.$project->id.'/file', [
            'attchement' => $file
        ]);
        $response->assertStatus(403);
    }
}
