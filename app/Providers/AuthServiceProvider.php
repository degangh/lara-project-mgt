<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use App\Project;
use App\Task;
use App\File;
use App\User;
use App\Policies\ProjectPolicy;
use App\Policies\TaskPolicy;
use App\Policies\FilePolicy;
use App\Policies\UserAdminPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Project::class => ProjectPolicy::class,
        Task::class => TaskPolicy::class,
        File::class => FilePolicy::class,
        User::class => UserAdminPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

        //
    }
}
