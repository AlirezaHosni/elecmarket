<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class,'category_users','user_id','id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_users','category_id','id');
    }
}
