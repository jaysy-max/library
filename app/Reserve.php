<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reserve_user_name', 'reserve_user_email', 'reserve_book_name',
        'member_id','stud_id','date_of_reservation','reserve_book_category'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
