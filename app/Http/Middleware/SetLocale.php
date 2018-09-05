<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Auth;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale') AND in_array(Session::get('locale'),Config::get('app.languages')))
        {
            App::setLocale(Session::get('locale'));
        }

        elseif (Auth::user()) 
        {
            App::setLocale(Auth::user()->locale);
        }

        else
        {
            App::setLocale(Config::get('app.fallback_locale'));
        }
        
        return $next($request);
    }
}
