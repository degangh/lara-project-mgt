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
        //$response->assertSessionHas("success",__("project.file_success"));

        Storage::disk('upload')->assertExists($file->hashName());

    }

    public function testMemberUploadFile()
    {

    }

    public function testOutsiderUploadFile()
    {

    }
}
