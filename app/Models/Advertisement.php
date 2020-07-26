<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Advertisement extends Model
{
    public function getImagePathAttribute(){
       if($this->image){
            return Storage::url($this->image);
        }else{
            return "https://via.placeholder.com/150";
        }
    }
    
}
