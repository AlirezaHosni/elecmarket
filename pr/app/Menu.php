<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
