<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember=$request->has('remember')?true:false;
        $credentials = $request->only('email', 'password');
        $authenticate=Auth::attempt($credentials,$remember);
        if($authenticate){
           return redirect()->route('admin.dashboard');
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
        return redirect()->route('login');
    }
}
