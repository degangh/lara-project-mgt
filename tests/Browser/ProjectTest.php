<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectTest extends DuskTestCase
{
    /**
     * A Dusk test:
     * Visit home page after login
     *
     * @return void
     */
    public function testLoginAndOpenProject()
    {
        $this->browse(function ($browser){
            $browser->loginAs(User::find(1))
                    ->visit('/projects')
                    ->assertSee('Project List');
        });
    }

    /**
     * A Dusk test:
     * Visit Click create project button
     * dialog should be poped up
     *
     * @return void
     */
    public function testNewProjectDialog()
    {
        $this->browse(function ($browser){
            $browser->loginAs(User::find(1))
                    ->visit('/projects')
                    ->press('Add New Project')
                    ->assertSee('Create a New Project');
        });
    }
    
}
