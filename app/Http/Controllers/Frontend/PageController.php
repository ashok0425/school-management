<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Information;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
  
    public function About()
    {
        
        $about  = Information::where('slug','aboutus')->first();
        return view('website.about',compact('about'));
    }
    public function Term()
    {
        
        $term  = Information::where('slug','termandcondition')->first();
        return view('website.termsandconditions',compact('term'));
    }
    public function Privacy(){
        
        $privacy  = Information::where('slug','privacyandpolicy')->first();
        return view('website.privacy',compact('privacy'));
    }
}