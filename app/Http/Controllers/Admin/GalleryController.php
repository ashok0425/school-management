<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Gallery_images;
use Symfony\Component\HttpFoundation\File\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery  = Gallery::orderBy('id','desc')->get();
        return view('admin.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.form');
        
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
            'thumbnail'=>'required|mimes:png,jpg,jpeg|max:200',
            'title'=>'required',
            'detail'=>'required',
        ]);

        try{

            $gallery = new Gallery;
            $gallery->title = $request->title;
            $gallery->detail = $request->detail;
            $file = $request->thumbnail;
            $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('upload/lyceex/gallery/', $filename);
            $gallery->thumbnail =$path;

            if($gallery->save()){
                $notification = array(
                    'message' => 'Gallery Saved Successfully', 
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.gallery.index')->with($notification);
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
       $gallery=Gallery::where('id',$params->gallery_id)->first();
        return view('admin.gallery.form',compact('gallery'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'detail'=>'required',
        ]);
      
        try{
            $params=__decryptToken();
            $gallery=array();
        $gallery['title'] = $request->title;
        $gallery['detail'] = $request->detail;
        if($request->thumbnail){
            $this->validate($request,[
                'thumbnail'=>'required|mimes:png,jpg,jpeg|max:200',
                'title'=>'required',
                'detail'=>'required',
            ]);
            unlink('storage/'.$request->img);
            $file = $request->thumbnail;
            $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('upload_del/lyceex/gallery/', $filename);
            $gallery['thumbnail'] =$path;
        }else{
            $gallery['thumbnail'] =$request->img;

        }
        $notification = array(
            'message' => 'Gallery updated', 
            'alert-type' => 'success'
            );
        Gallery::where('id',$params->gallery_id)->update($gallery);
            return redirect()->route('admin.gallery.index')->with($notification);
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
    public function destroy()
    {
        try{
            $params=__decryptToken();
            unlink('storage/'.Gallery::where('id',$params->gallery_id)->value('thumbnail'));
        Gallery::where('id',$params->gallery_id)->delete();
        unlink('storage/'.Gallery_images::where('gallery_id',$params->gallery_id)->value('images'));
        Gallery_images::where('gallery_id',$params->gallery_id)->delete();
            $notification = array(
                'message' => 'Gallery Deleted Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.gallery.index')->with($notification);
            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
