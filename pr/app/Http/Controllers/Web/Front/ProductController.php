<?php

namespace App\Http\Controllers\Web\Front;

use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductReportPrice;
use App\ProductValue;
use App\Province;
use App\Setting;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;
use Session;
use App\Supplement;
use DB;
class ProductController extends Controller
{
    public function product(Request $request, $id = null, $link = null)
    {
        $productCount = Product::where(['id' => $id, 'status' => 1])->count();

        if ($productCount == 0) {
            abort(404);
        }
        $productDetails = Product::with('category')->where('id', $id)->where(['status' => 1])->first();
        $relatedProducts = Product::where('id', '!=', $id)->where(['category_id' => $productDetails->category_id])->take(12)->get();
        $linked = Supplement::where(['main' => $productDetails->id])->with('product')->take(12)->get()->pluck('linked');
        //dd(['$linked']);
        $linkeds = DB::table('products')->whereIn('id', $linked)->get();
        //dd($linkeds);
        //dd($relatedProducts);
        //count
        $productKey = 'product_' . $productDetails->id;

        if (!Session::has($productKey)) {
            $productDetails->increment('view_count');
            Session::put($productKey,1);
        }
        //count
        $settings = Setting::latest()->first();
        $pro_value = ProductValue::where(['product_id' => $productDetails->id])->get();
        $comments = Comment::where(['commentable_id' => $productDetails->id,'commentable_type' => "App\Product"])
            ->where('status',1)
            ->get();
        $url = '/product/'.$productDetails->id.'/'.$productDetails->slug;
        //dd($url);
//        9
        return view('front.product.detail', compact('comments','productDetails', 'relatedProducts','settings','linkeds','pro_value'));
    }

    public function products()
    {
        $productDetails = Product::where(['status' => 1])->paginate(10);
        $settings = Setting::latest()->first();
        return view('front.product.products', compact('productDetails','settings'));
    }

    public function productsall(Request $request,$slug = null)
    {
        $data = $request->all();
        $categoryCount = Category::where(['slug' => $slug, 'status' => 1])->count();
        if ($categoryCount == 0) {
            abort(404);
        }
        $categoryDetails = Category::where(['slug' => $slug])->first();
        $cat_id = $categoryDetails->id;
        // Show 404 Page if Category does not exists
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        if ($categoryDetails->parent_id == 0) {
           // $subCategories = Category::where(['parent_id' => $categoryDetails->id])->get();
            $subCategories = Category::with(['products', 'children.products'])->where(['id' => $categoryDetails->id])->get();
            //dd($subCategories);
            //dd($subCategories);
            $subCategories = json_decode(json_encode($subCategories));
            foreach ($subCategories as $subcat) {
                $cat_ids[] = $subcat->id;
            }
            $productsAll = Product::whereIn('category_id', $cat_ids)->where('status', '1')->orderby('price', 'ASC')->paginate(10);


        }else {
            $productsAll = Category::where(['id' => $categoryDetails->id])->with(['products', 'childs.products'])->where('status', '1')->first();

            $categoryIds = $productsAll->products->pluck('category_id');
            //dd(count($categoryIds));
            if(count($categoryIds) > 1){
                $productsAll = Product::whereIn('category_id', $categoryIds)->where('status', '1')->paginate(10);
            }else{
                $productsAll = Product::where(['category_id' => $categoryDetails->id])->where('status', '1')->orderby('price', 'ASC')->paginate(10);
            }

            //dd($productsAll);
        }
        $settings = Setting::latest()->first();
        //dd($productsAll);
        return view('front.product.listing',compact('categories', 'productsAll', 'categoryDetails','settings'));
    }

    public function reportprice(Request $request,$id=null)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
           // dd($data);
            if (empty($data['site'])) {
                $site = null;
            } else {
                $site = $data['site'];
            }
            if (empty($data['name_shop'])) {
                $name_shop = null;
            } else {
                $name_shop = $data['name_shop'];
            }
            if (empty($data['province_id'])) {
                $province_id = null;
            } else {
                $province_id = $data['province_id'];
            }
            $pro_id = $data['pro_id'];
            $r = new ProductReportPrice();
            $r->product_id = $pro_id;
            $r->site = $site;
            $r->name_shop = $name_shop;
            $r->province_id = $province_id;
            $r->price = $data['price'];
            $r->save();
            return redirect('/');

        }
        $product = Product::where(['id' => $id])->first();
        $province = Province::orderBy('name')->get();
        return view('front.product.report_price',compact('product','province'));
    }
}
