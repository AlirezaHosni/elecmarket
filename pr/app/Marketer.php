<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketer extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function state()
    {
        return $this->belongsTo(Province::class,'state_id','id');
    }
}
