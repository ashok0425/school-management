<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use Exception;
use Auth;
class LevelController extends Controller
{   
    public function index(){
        
        $levels = Level::where('school_id','=',Auth::guard('school')->user()->id)->get();
        return view('admin.school.level.index',compact('levels'));   
    }

    public function show(){
        return view('admin.school.level.form');
    }

    public function store(Request $request){
        $this->validate($request,[
            'level'=>'required',
        ]);
        try{
            $level =  new Level;
            $level->level = $request->level;
            $level->school_id = Auth::guard('school')->user()->id;
            $level->save();
           
            $notification = array(
                'message' => 'Level created successfully', 
                'alert-type' => 'success'
              );
            return redirect()->route('school.level')->with($notification); 
        }catch(\Exception $e){
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }

    }

    public function edit( $level){
        try{
            $level = Level::where('school_id' ,Auth::guard('school')->user()->id)->where('id',$level)->first();
            if($level){
                return view('admin.school.level.edit-form',compact('level')); 
            }else{
                $notification = array(
                    'message' => 'Something went wrong! Please try later.', 
                    'alert-type' => 'error'
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

    public function update(Request $request,$level){
        try{
            $level = Level::where('school_id' ,Auth::guard('school')->user()->id)->where('id','=',$level)->first();
            if($level){
                $level->level = $request->level;
                $level->save();
                $notification = array(
                    'message' => 'Level updated successfully', 
                    'alert-type' => 'success'
                );
                return redirect()->route('school.level')->with($notification);
            }else{
                $notification = array(
                    'message' => 'Something went wrong! Please try later.', 
                    'alert-type' => 'error'
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

    public function destroy(Level $level){
        try{
            $level = Level::where('school_id',Auth::guard('school')->user()->id)->where('id','=',$level->id)->first();
            if($level){
                $level->delete();
                $notification = array(
                    'message' => 'Level deleted successfully', 
                    'alert-type' => 'success'
                );
                return redirect()->route('school.level')->with($notification); 
            }else{
                $notification = array(
                    'message' => 'Something went wrong! Please try later.', 
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            } 
        }catch(Exception $e){
            
            $notification = array(
                'message' => 'Something went wrong! Please try later.', 
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
    }
}
