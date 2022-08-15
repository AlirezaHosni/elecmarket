<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
use Session;
class Product extends Model
{
    public static function cartCount()
    {
        if (Auth::check()) {
            //User is logged in;we will use Auth
            $user_email = Auth::user()->id;
            $cartCount = DB::table('carts')->where('user_id', $user_email)->sum('quantity');
        }
        return $cartCount;
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function supplements()
    {
        return $this->hasMany(Supplement::class,'main');
    }

    public function productvalus()
    {
        return $this->hasMany(ProductValue::class,'product_id');
    }
    public function productreportprices()
    {
        return $this->hasMany(ProductReportPrice::class,'product_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public static function getProductCategoryChilds($productcategory_id)
    {
        $ids = "";
        //dd($productcategory_id);
        $childs = Category::where(['parent_id' => $productcategory_id])->get();
        //dd($childs);
        foreach ($childs as $child)
            // $chil = ProductCategory::where(['parent_id' => $child->id])->get();
            $ids .= self::getProductCategoryChilds($child->id) . ',';
        //echo "<pre>"; print_r($chil); die;
        $ids .= $productcategory_id;
        return $ids;
    }

    public static function getProductPrice($product_id)
    {
        $productDetails = Product::where('id', $product_id)->first();
        //echo "<pre>"; print_r($productDetails); die;
        if ($productDetails->special > 0) {
            if ($productDetails->special_type = "Percentage") {
                $getPrice = Product::select('price')->where('id', $product_id)->first();
                $getdiscount = Product::select('discount')->where('id', $product_id)->first();
                $getProductPrice = ($getPrice->price) - (($getdiscount->discount * $getPrice->price) / 100);
//                echo "<pre>"; print_r($getProductPrice); die;
                return $getProductPrice;
            } else {
                $getPrice = Product::select('price')->where('id', $product_id)->first();
                $getdiscount = Product::select('discount')->where('id', $product_id)->first();
                $getProductPrice = ($getPrice->price) - ($getdiscount->discount);
//                echo "<pre>"; print_r("2"); die;
                return $getProductPrice;
            }
        } else {
            $getProductPrice = Product::select('price')->where('id', $product_id)->first();
            return $getProductPrice->price;
        }

    }
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
