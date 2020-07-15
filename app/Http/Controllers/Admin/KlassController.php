<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klass;
use App\Models\Level;
class KlassController extends Controller
{
    public function index(){
        $klasses = Klass::all();
        return view('admin.class.index',compact('klasses'));   
    }

    public function show(){
        $levels = Level::all();
        return view('admin.class.form',compact('levels'));
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
            
            $klass->save();
            toastr()->success('Class created successfully');
            return redirect()->route('admin.class'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }

    }

    public function edit(Klass $klass){
        $levels = Level::all();
        return view('admin.class.edit-form',compact('klass','levels'));
    }

    public function update(Request $request,Klass $klass){
        $this->validate($request,[
            'class'=>'required',
            'level'=>'required|exists:levels,id',
        ]);
        try{
            $klass->class = $request->class;
            $klass->level_id = $request->level;
           
            $klass->save();
            toastr()->success('Class Update successfully');
            return redirect()->route('admin.class'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }
    }

    public function destroy(Klass $klass){
        try{
            $klass->delete();
            toastr()->success('Class Deleted successfully');
            return redirect()->route('admin.class'); 
        }catch(\Exception $e){
            toastr()->error('Something went wrong! Please try later.');
            return redirect()->back();
        }
    }
}
