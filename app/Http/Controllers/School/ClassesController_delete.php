<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Class;
use App\Models\Level;
use App\Models\Teacher;
use Auth;
use App\Models\ClassTeacherAssignee;
use Illuminate\Support\Facades\DB;


class ClassesController extends Controller
{
    public function index(){

        $data = DB::table('class_teacher_assignee')
            ->join('classes', 'class_teacher_assignee.class_id', '=', 'classes.id')
            ->join('teachers', 'class_teacher_assignee.teacher_id', '=', 'teachers.id')
            ->join('levels', 'classes.level_id', '=', 'levels.id')
            ->get();

        $classes = Class::with('level')->get();
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
            $class =  new Class;
            $class->class = $request->class;
            $class->level_id = $request->level;
            $class->school_id = Auth::guard('school')->user()->id;
            $class->save();
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
        $class = Class::where('school_id',Auth::guard('school')->user()->id)->where('id',$id)->first();
        if($class)
            return view('admin.school.class.edit-form',compact('Class','levels'));
        else{
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function update(Request $request,$class){
        $this->validate($request,[
            'class'=>'required',
            'level'=>'required|exists:levels,id',
        ]);
        try{
            $class = Class::where('school_id',Auth::guard('school')->user()->id)->where('id',$class)->first();
            if(!$class){
                $notification = array(
                    'message' => 'Something went wrong! Please try later.', 
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            $class->class = $request->class;
            $class->level_id = $request->level;

            $class->save();
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
            $class = Class::where('school_id',Auth::guard('school')->user()->id)->where('id',$id)->first();
            if(!$class){
                $notification = array(
                    'message' => 'Something went wrong! Please try later.', 
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            $class->delete();
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
