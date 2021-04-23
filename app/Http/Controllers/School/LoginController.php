<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\School;
use App\Models\SchoolVerify;
use App\Mail\VerifySchoolMail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('website.school.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // $remember=$request->has('remember')?true:false;
        $credentials = $request->only('email', 'password');
        $authenticate = Auth::guard('school')->attempt($credentials);
       
        if($authenticate){
           
           return redirect(__setLink('school/dashboard'));
        }else{
            $notification = array(
                'message' => 'Username and password did not match', 
                'alert-type' => 'error'
              );
             return redirect()->back()->with($notification);
        }
    }

    public function showForm()
    {
        $countries = DB::table('countries')->get();

        return view('website.school.register', compact('countries'));
    }
    
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required|string|max:191',
            'address'=>'required|string|max:191',
            'country' => 'required',
            'logo'=>'required|mimes:jpeg,jpg,png',
            'panno'=>'required',
            'contact'=>'required',
            'email'=>'required|email|unique:schools,email',
            'school_motto'=>'required|string',
            'password'=>'confirmed|min:6|string|required'
        ]);

        try{
            $country = explode(',', $request->country);
            $school = new School;
            $school->name = $request->name;
            $school->address = $request->address;
            $school->country_id = $country[0];
            $school->country_short_code = $country[1];
            $school->country_name = $country[2];
            $school->panno = $request->panno;
            $school->contact = $request->contact;
            $school->email = $request->email;
            $school->school_motto = $request->school_motto;
            $school->username = $request->email;
            $school->password = Hash::make($request->password);
            $file = $request->logo;
            $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('school-logo', $filename);
            $school->logo = $path;

            $school->save();
            $notification = array(
                'message' => 'School Registered Successfully! We have sent email for confirmation. Please check your registered mail', 
                'alert-type' => 'success'
            );
            $verifyUser = SchoolVerify::create([
                'school_id' => $school->id,
                'token' => sha1(time())
            ]);
            \Mail::to($school->email)->send(new VerifySchoolMail($school));
            return redirect()->route('school.login')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }

    public function resendVerifyLink(Request $request){
        $this->validate($request,[
            'cemail'=>'required|email',
        ]);
        // return response()->json($request);
        $data = School::where('email',$request->cemail)->first();
        if(!$data){
            $notification = array(
                'message' => 'Sorry your email cannot be identified.', 
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
        SchoolVerify::where('school_id',$data->id)->delete();
        $verifyUser = SchoolVerify::create([
            'school_id' => $data->id,
            'token' => sha1(time())
        ]);
        \Mail::to($data->email)->send(new VerifySchoolMail($data));
        $notification = array(
            'message' => 'We have sent password reset link to your account! Please check your email.', 
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);

    }

    public function verifyUser($token)
    {
        $verifyUser = SchoolVerify::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->school;
            if(!$user->email_verified_at) {
                $verifyUser->school->email_verified_at = Carbon::now();
                $verifyUser->school->save();
                $verifyUser->delete();
               
                $notification = array(
                    'message' => 'Your e-mail is verified.', 
                    'alert-type' => 'success'
                    );
            } else {
                
                $notification = array(
                    'message' => 'Your e-mail is already verified.', 
                    'alert-type' => 'success'
                    );
            }
            // Auth::guard('school')->attempt(['emial'=>$user->email,'password'=>$user->contact])
            // return redirect()->route('admin.change.password')->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry your email cannot be identified.', 
                'alert-type' => 'error'
                );
            return redirect('school/login')->with($notification);
        }
        return redirect('school/login')->with($notification);
       
    }

    public function forgotPassword(){
        return view('website.school.forgot-password');
    }
    public function forgotPasswordSendEmail(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
        ]);
        try{
            $user  = School::where('email',$request->email)->first();
            if(!$user){
                $notification = array(
                    'message' => 'Sorry your email cannot be identified.', 
                    'alert-type' => 'error'
                    );
                return redirect()->back()->with($notification);
            }else{
                if(!$user->email_verified_at){
                    return redirect()->back()->with(['user'=>$user]);
                }
                $verifyUser = SchoolVerify::create([
                    'school_id' => $user->id,
                    'token' => sha1(time())
                ]);
                \Mail::to($user->email)->send(new ForgotPasswordMail($user));
                $notification = array(
                    'message' => 'We have sent password reset link to your account! Please check your email.', 
                    'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
            }
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }
    }
    public function verifyResetLink($token)
    {
        $verifyUser = SchoolVerify::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->school;
            if(!$user->email_verified_at) {
               
               
                $notification = array(
                    'message' => 'Your e-mail is not verified.', 
                    'alert-type' => 'success'
                    );
            } else {
                return view('website.school.reset-password',compact('token'));
            }
        } else {
            $notification = array(
                'message' => 'Sorry your email cannot be identified.', 
                'alert-type' => 'error'
                );
            return redirect('/login')->with($notification);
        }
        return redirect('/login')->with($notification);
       
    }
    public function savePassword(Request $request)
    {
        $verifyUser = SchoolVerify::where('token', $request->token)->first();
        $this->validate($request,[
            'password'=>'required|min:6|confirmed',
        ]);
        if(isset($verifyUser) ){
            $user = $verifyUser->school;
            if(!$user->email_verified_at) {
               
               
                $notification = array(
                    'message' => 'Your e-mail is not verified.', 
                    'alert-type' => 'success'
                    );
            } else {
                $user->password = Hash::make($request->password);
                $user->save();
                $notification = array(
                    'message' => 'Your Password Changed Successfully.', 
                    'alert-type' => 'success'
                );
                $verifyUser->delete();
                return redirect()->route('school.login')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Sorry your email cannot be identified.', 
                'alert-type' => 'error'
                );
            return redirect('/login')->with($notification);
        }
        return redirect('/login')->with($notification);
       
    }

    public function logout(){
        Auth::logout();
        \Session::flush();
        return redirect()->route('school.login');
    }
}
