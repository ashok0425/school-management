<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Subject extends Model
{
    use SoftDeletes;

    public function klass(){
        return $this->belongsTo('App\Models\Klass')->withDefault();
    }
}

