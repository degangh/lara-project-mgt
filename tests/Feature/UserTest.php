<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
    public function testUserBasic()
    {
        $this->withoutMiddleware();
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserController()
    {
        $this->withoutMiddleware();
        $response = $this->get('/users');

        $response->assertStatus(200);
    }
}
