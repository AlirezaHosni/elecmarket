<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductValue extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
