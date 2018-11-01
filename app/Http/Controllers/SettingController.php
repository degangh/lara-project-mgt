<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function lang($locale)
    {
        Session::put('locale', $locale);
        $user = Auth::user();
        $user->locale = $locale;
        $user->save();
        return back();
    }
}
