<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    
    public function handle($request, Closure $next, $guard = null)
    {   
        
      
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
        if($gurad = 'superadmin' && Auth::guard($guard)->check())
        {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
