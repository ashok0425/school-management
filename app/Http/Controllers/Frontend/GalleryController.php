<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Gallery_images;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showGallery()
    {
        $gallery  = Gallery::orderBy('id','desc')->get();
        return view('website.gallery',compact('gallery'));
    }

    public function showGalleryImage()
    {
        $params=__decryptToken();
        $id=$params->id;
        $gallery  = Gallery_images::where('gallery_id',$id)->orderBy('id','desc')->get();
        return view('website.galleryimage',compact('gallery'));
    }

  
}