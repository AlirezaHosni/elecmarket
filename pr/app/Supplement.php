<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplement extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
