<?php

namespace App\Http\Controllers\School;

use App\Models\Teacher;
use App\Models\TeacherPass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssignTeacherController extends Controller
{

    //create teacher user and password
    public function create(Request $request)
    {
        $data['teachers'] = Teacher::all();

        return view('admin.school.assign-teacher.form', $data);
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
                $teacher = Teacher::where('school_id', Auth::guard('school')->user()->id)
                    ->where('id', $id[$i])->first();
                $teacher->password = bcrypt($password[$i]);
                $teacher->update();
            }

            $notification = array(
                'message' => 'Teacher Username and Password Assigned Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('school.teacher')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => 'Something went wrong! Please try later.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
