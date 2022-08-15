<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatFaq extends Model
{
    public function faqs(){
        return $this->hasMany(Faq::class,'catfaq_id');
    }
}
