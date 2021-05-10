<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use Validator;

class UserController extends Controller
{
    /** 
     * Teacher login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function TeacherLogin(Request $request){ 
        $teacherObject = Teacher::where('email',$request->email)->first();
        if($teacherObject && Hash::check($request->password, $teacherObject->password)){
            $teacherObject->token = getToken($teacherObject->toArray());
            return response()->json(['data' => $teacherObject], 200);
        }else{
            return response()->json(['error'=>'Could not authenticate, Please try again.'], 200);
        }
    }
    /** 
     * Student login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function StudentLogin(Request $request){ 
        $studentObject = Student::where('email',$request->email)->first();
        if($studentObject && Hash::check($request->password, $studentObject->password)){
            $studentObject->token = getToken($studentObject->toArray());
            return response()->json(['data' => $studentObject], 200);
        }else{
            return response()->json(['error'=>'Could not authenticate, Please try again.'], 200);
        }
    }
}
