<?php

namespace App\Models;

use App\Mail\TeacherStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Helper;

class Teacher extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    // protected $fillable = ['status'];

    /**
     * @var string[]
     */
    protected $casts = ['status' => 'boolean'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

    /***
    * Link with ClassTeacherAssignee
    */
    public function ClassTeacherAssignee() {
        return $this->hasMany('App\Models\ClassTeacherAssignee', 'teacher_id');
    }


    /**
     * Mark the teacher as blocked
     */
    public function blocked($id)
    {

        $this->where('id', $id)->update(['status' => true]);
        $userInfo = $this->find($id);
        return __sendMail($userInfo, 'block-user');
    }

    /**
     * Mark the teacher as  unblocked 
     */
    public function unblocked($id)
    {
       $this->where('id', $id)->update(['status' => false]);
       $userInfo = $this->find($id);
       return __sendMail($userInfo, 'unblock-user');
   }

   public function routine()
   {
    return $this->hasMany('App\Models\Routine', 'teacher_id');
   }


  
}
