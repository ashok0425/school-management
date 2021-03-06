<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

	

	public function section(){
		return $this->belongsTo('App\Models\Section')->withDefault();
	}

	public function routine()
	{
		return belongsTo('App\Models\Routine');
	}
}


