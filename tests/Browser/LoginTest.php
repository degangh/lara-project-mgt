<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends DuskTestCase
{
    
    protected function setUp()
    {
        parent::setUp();
        foreach (static::$browsers as $browser)
        {
            //$browser->driver->manage()->deleteAllCookies();
        }
    }
    
    /**
     * Login Test.
     * Correct Login
     *
     * @return void
     */
    public function testLogin()
    {
        $user = User::find(1);
        
        $this->browse(function ($browser) use ($user) {

            $browser->visit('/')
                    ->type('email', $user->email)
                    ->type('password', '123456')
                    ->press('Login')
                    ->assertSee(__('dashboard.dashboard'));
                
  
        });
    }

    /**
     * Login Test.
     * Incorrect Login
     *
     * @return void
     */
    public function testLoginWrongCredential()
    {
        //$browser->deleteCookie('project_session');
        
        $this->browse(function ($browser)  {

            $browser->visit('/login')
                    ->type('email', 'xxxx@xxxxx.xx')
                    ->type('password', '123456')
                    ->press('Login')
                    ->assertSee('These credentials do not match our records.');
     
        });
    }
}
