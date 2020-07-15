<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    public function index(){
        $levels = Level::all();
        return view('admin.level.index',compact('levels'));   
    }

    public function show(){
        return view('admin.level.form');
    }

    public function store(Request $request){
        $this->validate($request,[
            'level'=>'required',
        ]);
        try{
            $level =  new Level;
            $level->level = $request->level;
            
            $level->save();
            toastr()->success('Level created successfully');
            return redirect()->route('admin.level'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }

    }

    public function edit(Level $level){
        return view('admin.level.edit-form',compact('level'));
    }

    public function update(Request $request,Level $level){
        try{
            $level->level = $request->level;
           
            $level->save();
            toastr()->success('Level Update successfully');
            return redirect()->route('admin.level'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }
    }

    public function destroy(Level $level){
        try{
            $level->delete();
            toastr()->success('Level Deleted successfully');
            return redirect()->route('admin.level'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }
    }
}
