<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function catfaq(){
        return $this->belongsToMany(CatFaq::class);
    }
}
