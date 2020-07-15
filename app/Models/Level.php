<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Level extends Model
{
    use SoftDeletes;

    public function classes(){
        return $this->hasMany('App\Models\Level');
    }
}
