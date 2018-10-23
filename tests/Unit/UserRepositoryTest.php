<?php

namespace Tests\Unit;

use App\User;
use App\Repositories\UserRepository;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRepositoryTest extends TestCase
{
    
    public function testUserCreation()
    {
        $data = factory(User::class)->make();

        $userRepo = new UserRepository();

        $user = $userRepo->create($data);

        $this->assertDatabaseHas('users', ['email' => $data->email]);
    }
}
