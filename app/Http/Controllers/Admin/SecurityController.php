<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     * @throws \Exception
     */
    public function __construct(){

        //CHECKING IS REQUEST IS VALID OR NOT
        validateToken();   
    }
}
