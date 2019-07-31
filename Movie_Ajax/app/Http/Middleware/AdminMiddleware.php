<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminMiddleware
{   

    protected $auth;
    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if($this->auth->user()->email == 'admin@hotmail.com'){
            return $next($request);
            
        }else{
            Session::flash('message-error', 'Sin privilegios');
            return redirect()->to('admin');
        }
        
    }
}
