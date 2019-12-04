<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MyAuth 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$rights)
    {
    

	   	if ((Auth::check())&&(Auth::user()->rights == $rights))
    	{
			return $next($request);    	    	
    	}
    	else 
    	{ 

			$request->session()->put('url', $request->fullUrl());
	    	return redirect('login'); 
   // 		return $next($request);    	    	
    	}
    }
}
