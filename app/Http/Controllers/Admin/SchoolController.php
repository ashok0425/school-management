<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools  = School::all();
        return view('admin.admin.school.index',compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.school.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:191',
            'address'=>'required|string|max:191',
            'logo'=>'required|image',
            'panno'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'school_motto'=>'required|string',
        ]);
        try{
            $school = new School;
            $school->name = $request->name;
            $school->address = $request->address;
            $school->panno = $request->panno;
            $school->contact = $request->contact;
            $school->email = $request->email;
            $school->school_motto = $request->school_motto;
            $school->username = $request->email;
            $school->password = Hash::make($request->contact);
            $file = $request->logo;
            $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('school-logo', $filename);
            $school->logo = $path;
            $school->save();
            $notification = array(
                'message' => 'School Saved Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.school.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('admin.admin.school.edit-form',compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
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
            
            $school->name = $request->name;
            $school->address = $request->address;
            $school->panno = $request->panno;
            $school->contact = $request->contact;
            $school->email = $request->email;
            $school->school_motto = $request->school_motto;
            $school->username = $request->email;
            $school->password = Hash::make($request->contact);
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
            return redirect()->route('admin.school.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        try{
            $school->delete();
            $notification = array(
                'message' => 'School Deleted Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.school.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
