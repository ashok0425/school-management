<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klass;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('admin.subject.index',compact('subjects'));   
    }

    public function show(){
        $klasses = Klass::all();
        return view('admin.subject.form',compact('klasses'));
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
            
            $subject->save();
            toastr()->success('Subject created successfully');
            return redirect()->route('admin.subject'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }

    }

    public function edit(Subject $subject){
        $klasses = Klass::all();
        return view('admin.subject.edit-form',compact('subject','klasses'));
    }

    public function update(Request $request,Subject $subject){
        try{
            $subject->subject = $request->subject;
            $subject->klass_id = $request->klass;  
            $subject->save();
            toastr()->success('Subject Update successfully');
            return redirect()->route('admin.subject'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }
    }

    public function destroy(Subject $subject){
        try{
            $subject->delete();
            toastr()->success('Subject Deleted successfully');
            return redirect()->route('admin.subject'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }
    }
}
