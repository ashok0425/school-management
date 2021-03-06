<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class LoginController extends Controller
{
    public function index()
    {
        return view('admin.admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember=$request->has('remember')?true:false;
        $credentials = $request->only('email', 'password');
        $authenticate = Auth::guard('superadmin')->attempt($credentials);
       
        if($authenticate){
           
           return redirect('/admin/dashboard');
        }else{
            $notification = array(
                'message' => 'Username and password did not match', 
                'alert-type' => 'error'
              );
          return redirect()->back()->with($notification);
        }
    }

    public function logout(){
        Auth::logout();
        \Session::flush();
        return redirect()->route('admin.login');
    }
}
