<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class SchoolMiddleware
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
        if (  Auth::guard('school')->check()) { 
            $verify = Auth::guard('school')->user()->email_verified_at;
            if(!$verify){
                $notification = array(
                    'message' => 'You need to confirm your account. We have sent you an activation link, please check your email.', 
                    'alert-type' => 'error'
                    );
                Auth::guard('school')->logout();
                return back()->with($notification);   

            }
            return $next($request);
        }else{
            return redirect()->route('school.login');
        } 
    }
}
