<?php

namespace App\Http\Controllers\Web\Back;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductReportPrice;
use App\ProductValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DetailController extends Controller
{
    public function fani(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (!empty($data['fani'])) {
                $fani = $data['fani'];
            } else {
                $fani = null;
            }
            $pro_id = $data['pro_id'];
            Product::where(['id' => $pro_id])->update([
                'fani' => $fani
            ]);

            return redirect('ad/products/view')->with('flash_message_success', 'محصول  با موفقیت بروز شد');
        }
        $pro = Product::where(['id' => $id])->first();
        return view('admin.products.datails.fani', compact('pro'));
    }

    public function barsi(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (!empty($data['barsi'])) {
                $barsi = $data['barsi'];
            } else {
                $barsi = null;
            }
            $pro_id = $data['pro_id'];
            Product::where(['id' => $pro_id])->update([
                'description' => $barsi
            ]);

            return redirect('ad/products/view')->with('flash_message_success', 'محصول  با موفقیت بروز شد');
        }
        $pro = Product::where(['id' => $id])->first();
        return view('admin.products.datails.barsi', compact('pro'));
    }

    public function points(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (!empty($data['points'])) {
                $points = $data['points'];
            } else {
                $points = null;
            }
            $pro_id = $data['pro_id'];
            Product::where(['id' => $pro_id])->update([
                'points' => $points
            ]);

            return redirect('ad/products/view')->with('flash_message_success', 'محصول  با موفقیت بروز شد');
        }
        $pro = Product::where(['id' => $id])->first();
        return view('admin.products.datails.points', compact('pro'));
    }

    //downloads

    public function downloads(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            ini_set('memory_limit', '1024M');
            ini_set('post_max_size', '1024M');
            $download = $data['download'];
            $pro_id = $data['pro_id'];
            $extension = $download->getClientOriginalExtension();
            $getMimeType = $download->getMimeType();
            //echo "<pre>"; print_r($sizefile); die;
            $title_down = rand(11111111, 999999999) . '.' . $extension;
            $paths = 'upload/product_files/' . $pro_id . '/';
            $downloads_path = $paths . $title_down;
            if (!File::isDirectory($paths)) {
                File::makeDirectory($paths, $mode = 0777, true, true);
            }
            $download->move($paths, $title_down);
            $new_value = new ProductValue();
            $new_value->title = $data['title'];
            $new_value->type = $data['type'];
            $new_value->product_id = $pro_id;
            $new_value->link = $downloads_path;
            $new_value->save();

            return redirect()->back()->with('flash_message_success', 'محصول  با موفقیت بروز شد');

        }
        $pro = Product::where(['id' => $id])->first();
        $value = ProductValue::where(['product_id' => $id])->get();
        return view('admin.products.downloads.index', compact('pro', 'value'));
    }

    public function downloadsDel($id=null)
    {
        $media = ProductValue::where('id', $id)->first();
        if (file_exists($media->link)) {
            unlink($media->link);
        }
        ProductValue::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', 'فایل  با موفقیت کامل حذف شد');
    }

    public function comments(Request  $request,$id=null)
    {
        $pro = Product::where(['id' => $id])->first();
        $comments = Comment::where(['commentable_id' => $id,'commentable_type' => "App\Product"])->get();
        return view('admin.comments.index', compact('pro', 'comments'));

    }

    public function commentsCheck(Request $request,$id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            $pro_id = $data['pro_id'];
            Comment::where(['id' => $id])->update([
                'status' => $status
            ]);
            return redirect('/ad/products/comments/'.$pro_id)->with('flash_message_success', 'محصول  با موفقیت بروز شد');

        }
        $comments = Comment::where('id',$id)->first();
        return view('admin.comments.check',compact('comments'));
    }


    //report

    public function reportPrice(Request $request,$id=null)
    {

        $pro = Product::where(['id' => $id])->first();
        $value = ProductReportPrice::where(['product_id' => $id])->get();

        return view('admin.reports.price',compact('pro','value'));
    }

    public function changePrice(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $type = $data['type'];
            if($type=="percent"){
                $num = $data['num'];
                $pro = DB::table('products')
                    ->select('price','id', DB::raw('count(price) as total'))
                    ->groupBy('price','id')
                    ->get();
                foreach ($pro as $item){
                    $price = $item->price;
                    $total = $price * (1 + $num/100);
                    Product::where(['id' => $item->id])->update([
                        'price' => intval($total)
                    ]);

                }
                return redirect()->back()->with('flash_message_success', 'محصولات بروز شده اند');

            }elseif ($type=="number"){
                $num = $data['num'];
                $pro = DB::table('products')
                    ->select('price','id', DB::raw('count(price) as total'))
                    ->groupBy('price','id')
                    ->get();

                foreach ($pro as $item){
                    $price = $item->price;
                    $total = $price + $num;
                    Product::where(['id' => $item->id])->update([
                        'price' => $total
                    ]);

                }
                return redirect()->back()->with('flash_message_success', 'محصولات بروز شده اند');


            }
        }
        $pro = DB::table('products')
            ->select('price','title', DB::raw('count(price) as total_sales'))
            ->groupBy('price','title')
            ->get();

        return view('admin.products.reports.price',compact('pro'));
    }
}
