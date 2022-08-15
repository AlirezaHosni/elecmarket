<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public static function commentsCount($product_id)
    {
        $commentCount = DB::table('comments')->leftJoin('products', 'comments.commentable_id', '=', 'products.id')->get();
        //$commentCount = Product::where(['product_id' => $product_id, 'status' => 1])->count();
        return $commentCount;
    }
    public function commentable()
    {
        return $this->morphTo();
    }
    public function comments(){
        return $this->hasMany('App\Comment','parent_id');
    }
    public function parent()
    {
        return $this->comments()->with('parent');
    }
}
