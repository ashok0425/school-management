<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Klass;
use App\Models\Section;
use Auth;
use Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $students = Student::where('school_id',Auth::guard('school')->user()->id)->get();
        return view('admin.school.student.index',compact('students'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klasses = Klass::with('sections')->where('school_id',Auth::guard('school')->user()->id)->get();
        return view('admin.school.student.form',compact('klasses'));
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
            'name'=>'required',
            'email'=>'required|unique:students,email',
            'gurdian_no'=>'required',
            'address'=>'required',
            'roll_no'=>'required',
            'klass'=>'required',
            'section'=>'required',
            'image'=>'image|required',
        ]);
        try{
            $student =  new Student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->gurdian_no = $request->gurdian_no;
            $student->phonno = $request->phonno;
            $student->roll_no = $request->roll_no;
            $student->class_id = $request->klass;
            $student->section_id = $request->section;
            $student->address = $request->address;
            $student->school_id = Auth::guard('school')->user()->id;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('student-image', $filename);
                $student->image = $path;
            }
            $student->save();
            $student->password = Hash::make(date("Y").$request->class.$request->section.$student->id);
            $student->save();
            $notification = array(
                'message' => 'Student Created Successfully.', 
                'alert-type' => 'success'
            );
            return redirect()->route('school.student')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
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
    public function edit($id)
    {
        $klasses = Klass::with('sections')->where('school_id',Auth::guard('school')->user()->id)->get();
        $student = Student::where('school_id','=',Auth::guard('school')->user()->id)->where('id',$id)->first();
        
        if(!$student){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
        $sections = Section::where('class_id','=',$student->class_id)->get();
        return view('admin.school.student.edit-form',compact('klasses','student','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:students,id,'.$id,
            'gurdian_no'=>'required',
            'address'=>'required',
            'roll_no'=>'required',
            'klass'=>'required',
            'section'=>'required',
            'image'=>'image',
        ]);
        try{
            $student = Student::where('school_id',Auth::guard('school')->user()->id)->where('id',$id)->first();
            if(!$student){
                $notification = array(
                    'message' => 'Something went wrong! Please try later.', 
                    'alert-type' => 'error'
                  );
                return redirect()->back()->with($notification);
            }
            $student->name = $request->name;
            $student->email = $request->email;
            $student->gurdian_no = $request->gurdian_no;
            $student->phonno = $request->phonno;
            $student->roll_no = $request->roll_no;
            $student->class_id = $request->klass;
            $student->section_id = $request->section;
            $student->address = $request->address;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('student-image', $filename);
                $student->image = $path;
            }
            $student->save();
            $notification = array(
                'message' => 'Student Updated Successfully.', 
                'alert-type' => 'success'
            );
            return redirect()->route('school.student')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
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
    public function destroy($id)
    {
        $student = Student::where('school_id',Auth::guard('school')->user()->id)->where('id',$id)->first();
        if(!$student){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
        try{
            $student->delete();
            $notification = array(
                'message' => 'Student deleted Successfully.', 
                'alert-type' => 'success'
              );
            return redirect()->route('school.student')->with($notification); 
            
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }
}
