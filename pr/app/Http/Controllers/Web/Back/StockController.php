<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
class StockController extends Controller
{
    public function stock(Request $request,$id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $stock = $data['stock'];
            $product_id = $data['product_id'];
            if($stock > 0){
                $pro = Product::where('id', $id)
           ->first();
                $total = $pro->stock + $stock;
                Product::where(['id' => $product_id])->update([
                    'stock' => $total
                ]);
                return redirect('ad/products/view')->with('flash_message_success', 'محصول  با موفقیت بروز  شد');
            }else{
                return redirect()->back()->with('flash_message_success', 'عدد باید بیشتر از صفر باشه');  
            }
        }
        $pro = Product::where('id', $id)
           ->first();
        return view('admin.stocks.add',compact('pro'));
    }
}
