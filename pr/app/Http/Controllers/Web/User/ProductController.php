<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\OrderProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getproduct(Request $request)
    {
        $data = $request->all();
        $order_id = $_POST['order_id'];


        $product_id = 0;
        if (isset($_POST['product_id']))
            $product_id = $_POST['product_id'];

        $productall = OrderProduct::where('order_id',$order_id)->whereNull('referral_text')->get();
        if(count($productall) > 0){
            foreach ($productall as $city) {
                $t = "";
                if ($product_id == $city->id) $t = 'selected';
                echo '<option value="' . $city->id . '" ' . $t . '>' . $city->product_name .'-'. $city->product_price.'</option>';
            }
        }else{
            echo '<option value="none">محصولی یافت نشد</option>';
        }

    }
}
