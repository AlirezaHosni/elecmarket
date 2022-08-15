<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public function categories(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function parent()
    {
        return $this->categories()->with('parent');
        //return $this->belongsTo('App\Category', 'parent_id');
    }
    public function parentall() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(){
        return $this->belongsTo('App\Category', 'parent_id');
    }
    public function childs() {
        return $this->hasMany(Category::class, 'parent_id');
    }
//    public function products()
//    {
//        return $this->hasMany(Product::class,'category_id','id');
//    }
    public function products() {
        return $this->hasManyThrough(Product::class, Category::class, 'parent_id', 'category_id', 'id');
    }
    public function categoryUsers()
    {
        return $this->belongsToMany(CategoryUser::class,'category_users','category_id','id');
    }
}
