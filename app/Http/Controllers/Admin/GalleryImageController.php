<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery_images;


class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $params=__decryptToken();
        $gallery=Gallery_images::where('gallery_id',$params->gallery_id)->get();
        $gallery_id=$params->gallery_id;
        return view('admin.gallery.image',compact('gallery','gallery_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $params=__decryptToken();
        $gallery_id=$params->gallery_id;
        return view('admin.gallery.imagegalleryform',compact('gallery_id'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'thumbnail'=>'required|mimes:png,jpg,jpeg|max:200',        
        ]);
        try{
            $params=__decryptToken();
            $gallery = new Gallery_images;
            $file = $request->thumbnail;
            $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('upload/lyceex/gallery/imagegallery', $filename);
            $gallery->gallery_id =$params->gallery_id;
            $gallery->images =$path;
            if($gallery->save()){
                $notification = array(
                    'message' => 'Gallery Images Saved Successfully', 
                    'alert-type' => 'success'
                );
                return redirect(__setLink('admin/imagegallery/__list',['gallery_id'=>$params->gallery_id]))->with($notification);

            }else{
                $notification = array(
                    'message' => 'Gallery Images Not Saved, Please try again', 
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
    public function edit(){
       $params=__decryptToken();
       $gallery=Gallery_images::where('id',$params->gallery_id)->first();
        return view('admin.gallery.imagegalleryform',compact('gallery'));
        
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
            'thumbnail'=>'required|mimes:png,jpg,jpeg|max:200',
            ]);
        try{
            $params=__decryptToken();
            $gallery=array();
            if($request->thumbnail){
            unlink('storage/'.$request->img);
            $file = $request->thumbnail;
            $filename =  time().'-'.mt_rand(0,100000) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('upload/lyceex/gallery/imagegallery', $filename);
            $gallery['images'] =$path;
        }else{
            $gallery['images'] =$request->img;
        }
        $notification = array(
            'message' => 'Gallery Image updated', 
            'alert-type' => 'success'
            );
            Gallery_images::where('id',$params->gallery_id)->update($gallery);
            return redirect(__setLink('admin/imagegallery/__list',['gallery_id'=>$params->gallery_id]))->with($notification);
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
            unlink('storage/'.Gallery_images::where('id',$params->gallery_id)->value('images'));
            Gallery_images::where('id',$params->gallery_id)->delete();
            $notification = array(
                'message' => 'Gallery Images Deleted Successfully', 
                'alert-type' => 'success'
            );
            return redirect(__setLink('admin/imagegallery/__list',['gallery_id'=>$params->gallery_id]))->with($notification);

            
        }catch(\Exception $e){
            $notification = array(
            'message' => 'Something went wrong! Please try later', 
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
