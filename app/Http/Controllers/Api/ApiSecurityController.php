<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiSecurityController extends Controller
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
