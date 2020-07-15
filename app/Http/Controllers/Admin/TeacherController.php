<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index(){
        $users = User::where('role_id',2)->get();
        return view('admin.teacher.index',compact('users'));   
    }

    public function show(){
        return view('admin.teacher.form');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'contact'=>'required',
            'password'=>'required|confirmed',
        ]);
        try{
            $user =  new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename =  time().'user-image' . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('user_image', $filename);
                $user->image = $path;
            }
            $user->contact = $request->contact;
            $user->role_id = 2;
            $user->save();
            toastr()->success('Teacher created successfully');
            return redirect()->route('admin.dashboard'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }

    }

    public function edit(User $user){
        return view('admin.teacher.edit-form',compact('user'));
    }

    public function update(Request $request,User $user){
        $this->validate($request,[
            'email'=>'required|unique:users,email,'.$user->id,

        ]);
        try{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename =  time().'user-image' . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('user_image', $filename);
                $user->image = $path;
            }
            $user->contact = $request->contact;
            $user->save();
            toastr()->success('Teacher Update successfully');
            return redirect()->route('admin.dashboard'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }
    }

    public function destroy(User $user){
        try{
            $user->delete();
            toastr()->success('Teacher Deleted successfully');
            return redirect()->route('admin.dashboard'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }
    }
}
