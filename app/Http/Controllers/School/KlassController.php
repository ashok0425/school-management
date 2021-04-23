<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klass;
use App\Models\Level;
use App\Models\Teacher;
use Auth;
use App\Models\ClassTeacherAssignee;
use Illuminate\Support\Facades\DB;
class KlassController extends Controller
{
    public function index(){

        $data = DB::table('class_teacher_assignee')
            ->join('klasses', 'class_teacher_assignee.class_id', '=', 'klasses.id')
            ->join('teachers', 'class_teacher_assignee.teacher_id', '=', 'teachers.id')
            ->join('levels', 'klasses.level_id', '=', 'levels.id')
            ->get();

        $classes = Klass::with('level')->get();
        $teachers = Teacher::where('school_id', Auth::guard('school')->user()->id)->get();
        return view('admin.school.class.index',compact('data', 'classes', 'teachers'));   
    }

    public function show(){
        $levels = Level::where('school_id',Auth::guard('school')->user()->id)->get();
        return view('admin.school.class.form',compact('levels'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'class'=>'required',
            'level'=>'required|exists:levels,id',
        ]);
        try{
            $klass =  new Klass;
            $klass->class = $request->class;
            $klass->level_id = $request->level;
            $klass->school_id = Auth::guard('school')->user()->id;
            $klass->save();
            $notification = array(
                'message' => 'Class Created Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('school.class')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function edit(){
        $params = __decryptToken();
        $id = $params->id;
        $levels = Level::where('school_id',Auth::guard('school')->user()->id)->get();
        $klass = Klass::where('school_id',Auth::guard('school')->user()->id)->where('id',$id)->first();
        if($klass)
            return view('admin.school.class.edit-form',compact('klass','levels'));
        else{
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function update(Request $request,$klass){
        $this->validate($request,[
            'class'=>'required',
            'level'=>'required|exists:levels,id',
        ]);
        try{
            $klass = Klass::where('school_id',Auth::guard('school')->user()->id)->where('id',$klass)->first();
            if(!$klass){
                $notification = array(
                    'message' => 'Something went wrong! Please try later.', 
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            $klass->class = $request->class;
            $klass->level_id = $request->level;

            $klass->save();
            $notification = array(
                'message' => 'Class Updated Successfully', 
                'alert-type' => 'success'
            );
            return redirect(__setLink('school/class'))->with($notification); 
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
        $id = $params->id;
        try{
            $klass = Klass::where('school_id',Auth::guard('school')->user()->id)->where('id',$id)->first();
            if(!$klass){
                $notification = array(
                    'message' => 'Something went wrong! Please try later.', 
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            $klass->delete();
            $notification = array(
                'message' => 'Class Deleted Successfully.', 
                'alert-type' => 'success'
            );

            return redirect()->route('school.class')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function assignClassTeacher(Request $request) {


        $this->validate($request, [
            'teacher_id' => 'required',
        ]);


        $assignClassTeacher = ClassTeacherAssignee::select("*")->where('class_id', $request->class_id)->exists();

        if($assignClassTeacher) {
            $data = ClassTeacherAssignee::where('class_id', $request->class_id)->get();

           if(ClassTeacherAssignee::where('assign_id', $data[0]->assign_id )->update(array(
             'teacher_id'=> $request->teacher_id,))) {

                $notification = array(
                    'message'=> 'Class Teacher Updated Successfully.',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            } 
            else {
                $notification = array(
                    'message' =>'Unable to update Class Teacher! Please try later.',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);

            }

        } 
        else {

            try{
                $classteacher = new ClassTeacherAssignee;
                $classteacher->class_id = $request->class_id;
                $classteacher->teacher_id = $request->teacher_id;
                $classteacher->save();

                $notification = array(
                    'message'=> 'Teacher Assigned Successfully.',
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
}
