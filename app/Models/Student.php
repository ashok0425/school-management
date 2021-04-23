<?php

namespace App\Models;

use App\Mail\StudentStatus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Model
{
     /**
     * @var array
     */
    protected $guarded = [];

     /**
     * @var string[]
     */
    protected $casts = ['status' => 'boolean'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function klass()
    {
        return $this->belongsTo('App\Models\Klass', 'class_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany(AssignBooks::class,'student_id');
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

}
