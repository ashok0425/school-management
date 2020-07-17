<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    public function klass(){
        return $this->belongsTo('App\Models\Klass')->withDefault();
    }
}


