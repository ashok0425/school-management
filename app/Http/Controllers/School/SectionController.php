<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Klass;
use Auth;

class SectionController extends Controller
{
    public function index(){
        $sections = Section::where('school_id',Auth::guard('school')->user()->id)->get();
        return view('admin.school.section.index',compact('sections'));   
    }

    public function show(){
        $classes = Klass::where('school_id',Auth::guard('school')->user()->id)->get();
        return view('admin.school.section.form',compact('classes'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'section'=>'required',
            'class'=>'required|exists:klasses,id',
        ]);
        try{
            $section =  new Section;
            $section->section = $request->section;
            $section->class_id = $request->class;
            $section->school_id = Auth::guard('school')->user()->id;
            $section->save();
            $notification = array(
                'message' => 'Section Created Successfully', 
                'alert-type' => 'success'
              );
            return redirect()->route('school.section')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }

    }

    public function edit( ){
        $params = __decryptToken();
        $id = $params->id;
        $classes = Klass::where('school_id',Auth::guard('school')->user()->id)->get();
        $section = Section::where('school_id',Auth::guard('school')->user()->id)->where('id',$id)->first();
        if($section)
            return view('admin.school.section.edit-form',compact('section','classes'));
        else{
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }

    public function update(Request $request,$section){
        $this->validate($request,[
            'section'=>'required',
            'class'=>'required|exists:klasses,id',
        ]);
        try{
            $section = Section::where('school_id',Auth::guard('school')->user()->id)->where('id',$section)->first();
            if(!$section){
                $notification = array(
                    'message' => 'Something went wrong! Please try later.', 
                    'alert-type' => 'error'
                  );
                return redirect()->back()->with($notification);
            }
            $section->section = $request->section;
            $section->class_id = $request->class;
           
            $section->save();
            $notification = array(
                'message' => 'Section Updated Successfully', 
                'alert-type' => 'success'
              );
            return redirect()->route('school.section')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }

    public function destroy($section){
        try{
            $section = Section::where('school_id',Auth::guard('school')->user()->id)->where('id',$section)->first();
            if(!$section){
                $notification = array(
                    'message' => 'Something went wrong! Please try later.', 
                    'alert-type' => 'error'
                  );
                return redirect()->back()->with($notification);
            }
            $section->delete();
            $notification = array(
                'message' => 'Section Deleted Successfully.', 
                'alert-type' => 'success'
              );
           
            return redirect()->route('school.section')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }
}
