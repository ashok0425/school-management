<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{

    public function index(){
        return view('admin.admin.dashboard-body');
    }

    public function changePasswordForm(){
        return view('admin.admin.profile.change-password');
    }
    public function changePassword(Request $request){
        $this->validate($request,[
          'current_password'=>'required',
          'password'=>'required|min:5|max:50|confirmed',
        ]);
        
        if (!(Hash::check($request->get('current_password'), Auth::guard('superadmin')->user()->password))) {
          $notification = array(
            'message' => 'Your current password does not matches with the password you provided. Please try again.', 
            'alert-type' => 'error'
          );
          // The passwords matches
          return redirect()->back()->with($notification);
        }
        if(strcmp($request->get('current_password'), $request->get('password')) == 0){
          $notification = array(
            'message' => 'New Password cannot be same as your current password. Please choose a different password.', 
            'alert-type' => 'error'
          );
          return redirect()->back()->with($notification);
        }
        $user = Auth::guard('superadmin')->user();
        $user->password = Hash::make($request->get('password'));
        $user->save();
        $notification = array(
          'message' => 'Your password changed successfully.', 
          'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    
    
      }

      public function updateProfileForm(){
        return view('admin.admin.profile.profile');
      }

      public function updateProfile(Request $request){
        $this->validate($request,[
          'name'=>'string|required',
          'email'=>'required|email|unique:super_admins,id,'.Auth::guard('superadmin')->user()->id,
          'image'=>'image'
        ]);
        try{
            $user = Auth::guard('superadmin')->user();
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->has("block")){
              $user->block = $request->block?1:0;
            }
            if($request->hasFile('image')){
              $file = $request->image;
              $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
              $path = $file->storeAs('super-admin', $filename);
              $user->image = $path;
            }
            $user->save();
            $notification = array(
              'message' => 'School Saved Successfully', 
              'alert-type' => 'success'
            );
          return redirect()->back()->with($notification);
        }catch(\Exception $e){
          $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
      }

    
}
