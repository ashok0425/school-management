<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Information;


class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information  = Information::orderBy('id','desc')->get();
        return view('admin.information.index',compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information.form');
        
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
            'slug'=>'required|max:50',
            'title'=>'required',
            'detail'=>'required',
        ]);

        try{

            $information = new Information;
            $information->slug = $request->slug;
            $information->title = $request->title;
            $information->detail = $request->detail;

            if($information->save()){
                $notification = array(
                    'message' => 'Information Saved Successfully', 
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.information.index')->with($notification);
            }else{
                $notification = array(
                    'message' => 'Information Not Saved, Please try again', 
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
          }   
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
     * @param  \App\information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       $params=__decryptToken();
       $information=Information::where('id',$params->information_id)->first();
        return view('admin.information.form',compact('information'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {

        $this->validate($request,[
            'slug'=>'required',
            'title'=>'required',
            'detail'=>'required',
        ]);
      
        try{
            $params=__decryptToken();
            $information=array();
       $information['slug'] = $request->slug;
        $information['title'] = $request->title;
        $information['detail'] = $request->detail;
        Information::where('id',$params->information_id)->update($information);

            $notification = array(
                'message' => 'information Updated Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.information.index')->with($notification);
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
     * @param  \App\information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        try{
            $params=__decryptToken();
            $gallery=Information::where('id',$params->information_id)->delete();
            $notification = array(
                'message' => 'information Deleted Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.information.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
