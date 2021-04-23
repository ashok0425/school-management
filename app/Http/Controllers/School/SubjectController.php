<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klass;
use App\Models\Subject;
use Auth;
use App\Models\Teacher;
use App\Models\SubjectTeacherAssignee;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\ClassTeacherAssignee;

class SubjectController extends Controller
{
    public function index(){
        $data = DB::table('subjects')
        ->join('sections', 'sections.id', '=', 'subjects.section_id')
        ->join('klasses', 'sections.class_id', '=', 'klasses.id')
        ->select('sections.class_id' , 'sections.section', 'klasses.class','sections.id', 'subjects.*')
        ->get();
        $teachers = Teacher::where('school_id', Auth::guard('school')->user()->id)->get();
        return view('admin.school.subject.index',compact('data', 'teachers'));   
    }

    public function show(){
        $klasses = Klass::with('sections')->where('school_id',Auth::guard('school')->user()->id)->get();
        return view('admin.school.subject.form',compact('klasses'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'subject'=>'required',
            'section'=>'required|exists:sections,id',
        ]);
        try{
            $subject =  new Subject;
            $subject->subject = $request->subject;
            $subject->section_id = $request->section;
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

    public function edit(){
        $params = __decryptToken();
        $id = $params->id;
        $klasses = Klass::with('sections')->where('school_id',Auth::guard('school')->user()->id)->get();
        $subject = Subject::where('school_id',Auth::guard('school')->user()->id)->where('id',$id)->first();
        if(!$subject){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        return view('admin.school.subject.edit-form',compact('subject','klasses'));
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
            $subject->section_id = $request->section;  
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

    public function destroy(){
        $params = __decryptToken();
        $id =  $params->id;
        $subject = Subject::where('school_id',Auth::guard('school')->user()->id)->where('id',$id)->first();
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

    public function assignSubjectTeacher(Request $request) {
        $params = __decryptToken();
        $subteacher = SubjectTeacherAssignee::with('teacher')->where('subject_id', $params->sub_id)->get();
       

        $teachers = Teacher::where('school_id', Auth::guard('school')->user()->id)->get();
        $data = Klass::with('sections')->find($params->class_id);
        $subInfo = Subject::find($params->sub_id);

        return view('admin.school.subject.assign-subject-teacher', compact('subteacher', 'teachers', 'data', 'subInfo'));
    }

    public function insertSubjectTeacher(Request $request) {
        $params = __decryptToken();
        $this->validate($request, [
            'teacher_id' => 'required',
        ]);

        try{
            $subteacher = new SubjectTeacherAssignee;
            $subteacher->subject_id = $request->subject_id;
            $subteacher->teacher_id = $request->teacher_id;
            $subteacher->save();

            $notification = array(
                'message'=> 'Subject Teacher Assigned Successfully.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);

        } catch(\Exception $e) {
            $notification = array(
                'message' =>'Something went wrong! Please try later.',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }  
    }
}
