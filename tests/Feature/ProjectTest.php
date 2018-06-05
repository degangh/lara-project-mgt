<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProjectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProjectBasic()
    {
        $this->withoutMiddleware();
        $this->assertTrue(true);
    }

    public function testProjectRouter()
    {
        $this->withoutMiddleware();
        $response = $this->get('/projects');
        $response->assertStatus(200);
    }
}
