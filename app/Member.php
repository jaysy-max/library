<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reserve()
    {
        return $this->hasMany(Reserve::class);
    }
}
