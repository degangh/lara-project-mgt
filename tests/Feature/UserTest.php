<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;

class UserTest extends TestCase
{   
    use RefreshDatabase;
    function setup()
    {
        parent::setup();
        \Artisan::call('db:seed');

    }
    public function testUserBtn()
    {
        $user = User::where('is_admin', 1)->first();

        
        $response = $this->actingAs($user)->get('/users');

        $response->assertSee(__("user.create"));
    }
}
