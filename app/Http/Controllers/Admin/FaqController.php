<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq  = Faq::orderBy('id','desc')->get();
        return view('admin.faq.index',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.form');
        
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
            'title'=>'required',
            'description'=>'required',
        ]);

        try{

            $information = new Faq;
            $information->title = $request->title;
            $information->description = $request->description;

            if($information->save()){
                $notification = array(
                    'message' => 'Faq Saved Successfully', 
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.faq.index')->with($notification);
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
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       $params=__decryptToken();
       $faq=Faq::where('id',$params->faq_id)->first();
        return view('admin.faq.form',compact('faq'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $information)
    {

        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
        ]);
      
        try{
            $params=__decryptToken();
            $information=array();
      
        $information['title'] = $request->title;
        $information['description'] = $request->description;
        Faq::where('id',$params->faq_id)->update($information);

            $notification = array(
                'message' => 'Faq Updated Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.faq.index')->with($notification);
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
    public function destroy(Faq $information)
    {
        try{
            $params=__decryptToken();
            $gallery=Faq::where('id',$params->faq_id)->delete();
            $notification = array(
                'message' => 'information Deleted Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.faq.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
