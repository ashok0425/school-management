<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Level extends Model
{

    public function classes(){
        return $this->hasMany('App\Models\Level');
    }

}
