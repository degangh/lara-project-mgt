<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use App\User;

class SettingController extends Controller
{
    public function __construct()
    {
        
    }

    public function lang($locale)
    {
        Session::put('locale', $locale);
        $user = Auth::user();
        $user->locale = $locale;
        $user->save();
        return back();
    }

    public function loginAs(User $user)
    {
        try
        {
            $this->authorize("edit", User::class);
        }
        catch(\Exception $e)
        {
            abort('403', __('exception.userEditNotAllowed'));
        }
        
        Auth::loginUsingId($user->id);
        return redirect(url('/dashboard'));
    }
}
