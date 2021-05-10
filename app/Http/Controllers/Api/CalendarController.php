<?php

namespace App\Http\Controllers\Api;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CalendarController extends ApiSecurityController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        $params = __decryptToken();
        $events = Events::where('school_id',$params->school_id)->get();
        return response()->json(['data' => $events], 200);
    }
}
