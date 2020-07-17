<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klass;
use App\Models\Level;
use Auth;
class KlassController extends Controller
{
    public function index(){
        $klasses = Klass::where('school_id',Auth::guard('school')->user()->id)->get();
        return view('admin.school.class.index',compact('klasses'));   
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

    public function edit( $klass){
        $levels = Level::where('school_id',Auth::guard('school')->user()->id)->get();
        $klass = Klass::where('school_id',Auth::guard('school')->user()->id)->where('id',$klass)->first();
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
            return redirect()->route('school.class')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }

    public function destroy($klass){
        try{
            $klass = Klass::where('school_id',Auth::guard('school')->user()->id)->where('id',$klass)->first();
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
}
