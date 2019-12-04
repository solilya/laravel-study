<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
	

       if (Auth::guard($guard)->check()) {
           return redirect()->intended('/newform'); //сюда отправится пользователь если обратится по адресу /login а пользователь залогинен
       }
       return $next($request);
/*
		if ($request->session()->has('url')) 
    	{
			$url = $request->session()->get('url');
			$request->session()->forget('url');
			return redirect()->away($url);
		}
       else  
       { 
       		return $next($request);
       }
*/
    }
}
