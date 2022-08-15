<?php

namespace App\Http\Controllers\Web\Seller;

use App\Address;
use App\Cart;
use App\CategoryUser;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Setting;
use App\User;
use App\Wallet;
use Auth;
use DB;
use Illuminate\Http\Request;
use Session;

class OrdersController extends Controller
{
    public function addtocart(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $ip = $request->ip();
        $total = $data['price'] * $data['quantity'];

        $user_id = Auth::user()->id;
        $pro_id = $data['product_id'];
        $checkstock = Product::where('id', $pro_id)
           ->first()->stock;
        if($checkstock <= 0){
            return redirect()->back()->with('flash_message_success', 'موجودی کافی نیست');
        }   
        $user = User::where(['id' => $user_id])->first();
        //dd($user);
        if ($user->type_identity == "marketer") {
            return redirect('/')->with('flash_message_success', 'کاربر عزیز اجازه خرید ندارید');
        } elseif ($user->type_identity == "supplier") {
            return redirect('/')->with('flash_message_success', 'کاربر عزیز اجازه خرید ندارید');
        } else {
            if (Auth::check()) {
                $countProducts = DB::table('carts')->where(['product_id' => $data['product_id'], 'user_id' => $user_id])->count();
                if ($countProducts > 0) {
                    return redirect()->back()->with('flash_message_error', 'این محصول قبلا به سبد خرید شما اضافه شده است');
                }
            }
            DB::table('carts')
                ->insert([
                    'product_id' => $data['product_id'], 'total' => $total, 'quantity' => $data['quantity'], 'user_id' => $user_id, 'ip' => $ip

                ]);

            return redirect('/sellers/cart')->with('flash_message_success', 'محصول در سبد اضافه شده است!');
        }
    }

    public function cart()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $user = User::where(['id' => $user_id])->first();
            if ($user->type_identity == "marketer" && $user->type_identity == "supplier") {
                return redirect('/')->with('flash_message_success', 'کاربر عزیز اجازه خرید ندارید');
            }
            $userCart = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->get();


        }
        $countdown = "";
        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $cat_id = $productDetails->category_id;

            $type_identity = $user->type_identity;
            $checkcat = CategoryUser::where(['user_id' => $user_id, 'category_id' => $cat_id])->first();
            if (!@empty($checkcat)) {
                $countdown = $checkcat->discount_category ?? '5';
            } else {
                $countdown = 0;
            }
            $userCart[$key]->cover = $productDetails->cover;
            $userCart[$key]->price = $productDetails->price;
            $userCart[$key]->producttitle = $productDetails->title;
        }
        //dd($userCart);
        //dd($userCart);
        $settings = Setting::latest()->first();
        return view('sellers.orders.cart', compact('userCart', 'settings'));
    }

    public function updateCartQuantity($id = null, $quantity = null)
    {
        //dd($id);
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $user = User::where(['id' => $user_id])->first();
            if ($user->type_identity == "marketer" && $user->type_identity == "supplier") {
                return redirect('/')->with('flash_message_success', 'کاربر عزیز اجازه خرید ندارید');
            }
        }
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $getProductSKU = DB::table('carts')->select('product_id', 'quantity')->where('id', $id)->first();
        //dd($getProductSKU); die;

        //echo $getProductStock;die;
        $updated_quantity = $getProductSKU->quantity + $quantity;
        DB::table('carts')->where('id', $id)->increment('quantity', $quantity);
        $checkorder = Cart::where(['id' => $id])->count();
        return redirect('sellers/cart')->with('flash_message_success', 'مقدار محصول در سبد به روز شد!');

    }

    public function delCartQuantity($id = null)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $user = User::where(['id' => $user_id])->first();

        }
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $getProductSKU = DB::table('carts')->select('product_id', 'quantity')->where('id', $id)->first();
        //echo $getProductSKU->product_id;die;

        //echo $getProductStock;die;
        DB::table('carts')->where('id', $id)->delete();
        return redirect('sellers/cart')->with('flash_message_success', 'محصول از سبد حذف شد');
    }

    public
    function deleteCartProduct($id = null)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('orders')->where('cart_id', $id)->delete();
        DB::table('carts')->where('id', $id)->delete();
        return redirect('sellers/cart')->with('flash_message_success', 'محصول از سبدتان حذف شد ');
    }

    public
    function shippings(Request $request)
    {

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userCart = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->get();
            $count = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->count();
            $userDetail = User::find($user_id);
            $userProfileDetail = \App\Profile::with('user')->where('user_id', $user_id)->first();
        }
        if ($count == 0) {
            return redirect('cart')->with('flash_message_success', 'محصول در سبد خرید نیست');
        }
        $total_orders = 0;
        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $userdi = User::where('id', $product->user_id)->first();
            $userCart[$key]->cover = $productDetails->cover;
            $userCart[$key]->price = $productDetails->price;
            $userCart[$key]->producttitle = $productDetails->title;
            $total = $productDetails->price * $userCart[$key]->quantity;
            $total_orders += $total;
        }


        $address = Address::where(['user_id' => $user_id])->latest()->get();
        $settings = Setting::latest()->first();
        return view('sellers.orders.shippings', compact('userCart', 'settings', 'address', 'userDetail', 'userProfileDetail','total_orders'));
    }

    public function checkSeller(Request $request)
    {
        // $checkseller = Order::where(['user_id' => $user_id, 'order_status' => 'close'])->count();
        if ($request->isMethod('post')) {
            $user_id = Auth::user()->id;
            $data = $request->all();
            if (empty($data['address_id'])) {
                return redirect()->back()->with('flash_message_error', 'ابتدا آدرس خود را انتخاب کنید یا ایجاد کنید ');
            }
            if (empty($data['transport'])) {
                return redirect()->back()->with('flash_message_error', 'لطفا نحوه حمل را انتخاب کنید');
            }
            // dd($data);
            $tracking_code = "EL" . Helper::generatecodes();
            $order = new Order();
            $order->user_id = $data['user_id'];
            $order->address_id = $data['address_id'];
            // $order->state_id = $data['state'];
            $order->post_string = $data['transport'];
            $order->total = $data['total'];
            $order->tracking_code = $tracking_code;
            $order->order_status = "Panding";
            $order->save();
            $order_id = DB::getPdo()->lastInsertId();
            $cartProducts = DB::table('carts')->where(['user_id' => $data['user_id']])->get();
            foreach ($cartProducts as $pro) {
                $cartPro = new OrderProduct();
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $pro->product_id;
                $title = Product::where(['id' => $pro->product_id])->first()->title;
                $cartPro->product_name = $title;
                $product_price = $pro->total;
                $cartPro->product_price = $product_price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();

            }
            $mark = CategoryUser::where(['user_id' => $data['user_id']])->first();
            $total = $data['total'];
            if (!@empty($mark)) {
                $code_seller_seller = $mark->code_seller_seller;
                $percent = $mark->countdown_category;
                if (!@empty($percent)) {
                    $totalpercent = ($total * ($percent / 100));
                    $user = User::where(['username' => $code_seller_seller])->first();
                    $totalwallet = Wallet::where(['user_id' => $user->id])->first()->deposit;
                    $percentwallet = $totalwallet + $totalpercent;
                    Wallet::where(['user_id' => $code_seller_seller])->update([
                        'deposit' => $percentwallet
                    ]);
                    DB::table('carts')->where('user_id', $data['user_id'])->delete();
                    return redirect('sellers/payments/' . $order_id);
                }

                DB::table('carts')->where('user_id', $data['user_id'])->delete();
                return redirect('sellers/payments/' . $order_id)->with('flash_message_success', 'سفارش شما ایجاد شد ');
            } else {
                DB::table('carts')->where('user_id', $data['user_id'])->delete();
                return redirect('sellers/payments/' . $order_id)->with('flash_message_success', 'سفارش شما ایجاد شد ');
            }
            //percent
        }
    }



}
