<?php

namespace App\Http\Middleware;

use Closure;

class MyAuth
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

    	$user->rights == $rights; 
    	
        return $next($request);
    }
}
