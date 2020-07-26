<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements  = Advertisement::all();
        return view('admin.admin.advertisment.index',compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.advertisment.form');
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
            'title'=>'required|string|max:191',
            'link'=>'required|string|max:191|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'image'=>'required|image|max:1000|mimes:jpeg,jpg,gif',
        ]);
        try{
            $school = new Advertisement;
            $school->title = $request->title;
            $school->link = $request->link;
           
            $file = $request->image;
            $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('advertisement', $filename);
            $school->image = $path;
            $school->save();
            $notification = array(
                'message' => 'Advertisement Saved Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.advertisement.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
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
    public function edit(Advertisement $advertisement)
    {
        return view('admin.admin.advertisment.form',compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $this->validate($request,[
            'name'=>'required|string|max:191',
            'link'=>'required|string|max:191|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'image'=>'image|max:1000,mimes:jpeg,jpg,gif',
        ]);
        try{
            
            $advertisement->title = $request->title;
            $advertisement->link = $request->link;
            if($request->hasFile('image')){
                $file = $request->image;
                $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('advertisement', $filename);
                $advertisement->image = $path;
            }
            $advertisement->save();
            $notification = array(
                'message' => 'Advertisement Updated Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.advertisement.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
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
    public function destroy(Advertisement $advertisement)
    {
        try{
            $advertisement->delete();
            $notification = array(
                'message' => 'Advertisement Deleted Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.advertisement.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
