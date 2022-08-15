<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
