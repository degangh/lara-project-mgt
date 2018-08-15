<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertTitle('Project');
        });
    }

    public function testNoLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertSee('Login');
        });
    }

    public function testLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                    ->type('email', 'hdg@sina.com')
                    ->type('password', '123456')
                    ->press('Login')
                    ->assertSee('Project List');
        });
    }
}
