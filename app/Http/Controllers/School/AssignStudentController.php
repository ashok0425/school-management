<?php

namespace App\Http\Controllers\School;

use App\Models\Student;
use App\Models\StudentPass;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssignStudentController extends Controller
{
    //create teacher user and password
    public function create(Request $request)
    {
        $data['students'] = Student::all();
        return view('admin.school.assign-student.form', $data);
    }

    //store the teacher user and pass
    public function store(Request $request)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);
        try {
            $id = $request->id;
            $password = $request->password;

            for ($i = 0; $i < count($id); $i++) {
                if (isset($password[$i])){
                    $student = Student::where('school_id', Auth::guard('school')->user()->id)
                        ->where('id', $id[$i])->first();
                    $student->password = bcrypt($password[$i]);
                    $student->update();
                }
            }

            $notification = array(
                'message' => 'Student Username and Password Assigned Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('school.student')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => 'Something went wrong! Please try later.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
