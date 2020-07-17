<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.school.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember=$request->has('remember')?true:false;
        $credentials = $request->only('email', 'password');
        $authenticate = Auth::guard('school')->attempt($credentials);
       
        if($authenticate){
           
           return redirect('/school/dashboard');
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
        return redirect()->route('school.login');
    }
}
