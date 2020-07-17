<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klass;
use App\Models\Subject;
use Auth;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::where('school_id',Auth::guard('school')->user()->id)->get();
        return view('admin.school.subject.index',compact('subjects'));   
    }

    public function show(){
        $klasses = Klass::where('school_id',Auth::guard('school')->user()->id)->get();
        return view('admin.school.subject.form',compact('klasses'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'subject'=>'required',
            'klass'=>'required|exists:klasses,id',
        ]);
        try{
            $subject =  new Subject;
            $subject->subject = $request->subject;
            $subject->klass_id = $request->klass;
            $subject->school_id = Auth::guard('school')->user()->id;
            $subject->save();
            $notification = array(
                'message' => 'Subject Created Successfully.', 
                'alert-type' => 'success'
              );
            return redirect()->route('school.subject')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }

    }

    public function edit($subject){
        $klasses = Klass::where('school_id',Auth::guard('school')->user()->id)->get();
        $subject = Subject::where('school_id',Auth::guard('school')->user()->id)->where('id',$subject)->first();
        if(!$subject){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
        return view('admin.subject.edit-form',compact('subject','klasses'));
    }

    public function update(Request $request, $subject){
        $subject = Subject::where('school_id',Auth::guard('school')->user()->id)->where('id',$subject)->first();
        if(!$subject){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
        try{
            $subject->subject = $request->subject;
            $subject->klass_id = $request->klass;  
            $subject->save();
            $notification = array(
                'message' => 'Subject Updated Successfully.', 
                'alert-type' => 'success'
              );
            return redirect()->route('school.subject')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }

    public function destroy($subject){
        $subject = Subject::where('school_id',Auth::guard('school')->user()->id)->where('id',$subject)->first();
        if(!$subject){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
        try{
            $subject->delete();
            $notification = array(
                'message' => 'Subject Deleted Successfully.', 
                'alert-type' => 'success'
              );
            return redirect()->route('school.subject')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }
}
