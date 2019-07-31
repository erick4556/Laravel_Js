<?php

namespace PruebaLaravel\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::User()->email == 'admin@hotmail.com'){
            return $next($request);
        }else{
            return abort(401);
        }
    }
}
