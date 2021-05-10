<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
  

    public function faq(){ 
        $faq  = Faq::all();
        return view('website.faq',compact('faq'));
    }
}