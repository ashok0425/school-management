<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
class DashboardController extends Controller
{
    public function index(){
        return view('admin.school.dashboard-body');
    }

    public function changePasswordForm(){
        return view('admin.school.profile.change-password');
    }

    public function changePassword(Request $request){
        $this->validate($request,[
          'current_password'=>'required',
          'password'=>'required|min:5|max:50|confirmed',
        ]);
        
        if (!(Hash::check($request->get('current_password'), Auth::guard('school')->user()->password))) {
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
        $user = Auth::guard('school')->user();
        $user->password = Hash::make($request->get('password'));
        $user->save();
        $notification = array(
          'message' => 'Your password changed successfully.', 
          'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    
    
      }

      public function editProfile(Request $request){
        $school = Auth::guard('school')->user();
        return view('admin.school.profile.profile',compact('school'));
      }

      public function updateProfile(Request $request)
      {
          $this->validate($request,[
              'name'=>'required|string|max:191',
              'address'=>'required|string|max:191',
              'logo'=>'image',
              'panno'=>'required',
              'contact'=>'required',
              'email'=>'required',
              'school_motto'=>'required|string',
          ]);
          try{
              $school = Auth::guard('school')->user();
              $school->name = $request->name;
              $school->address = $request->address;
              $school->panno = $request->panno;
              $school->contact = $request->contact;
              $school->email = $request->email;
              $school->school_motto = $request->school_motto;
              if($request->hasFile('logo')){
                  $file = $request->logo;
                  $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
                  $path = $file->storeAs('school-logo', $filename);
                  $school->logo = $path;
              }
              $school->save();
              $notification = array(
                  'message' => 'School Updated Successfully', 
                  'alert-type' => 'success'
              );
              return redirect()->route('school.edit.profile')->with($notification); 
          }catch(\Exception $e){
              $notification = array(
              'message' => 'Something went wrong! Please try later', 
              'alert-type' => 'error'
              );
              return redirect()->back()->with($notification);
          }
      }
      
}
