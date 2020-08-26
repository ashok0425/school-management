<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AssignBooks extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Books::class,'book_id');
    }

    /**
     *
     */
    public function returned()
    {
        $this->update(['returned_date' => Carbon::now()]);
    }


    /**
     *
     */
    public function notreturned()
    {
        $this->update(['returned_date' => NULL ]);
    }
}
