<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReportPrice extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }
}
