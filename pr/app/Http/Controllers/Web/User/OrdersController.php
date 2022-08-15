<?php

namespace App\Http\Controllers\Web\User;

use App\Address;
use App\Cart;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Library\SmsHelper;
use App\Marketer;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Province;
use App\Setting;
use App\Transaction;
use App\User;
use App\Wallet;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Session;

class OrdersController extends Controller
{

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

        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $userCart[$key]->cover = $productDetails->cover;
            $userCart[$key]->price = $productDetails->price;
            $userCart[$key]->producttitle = $productDetails->title;
        }
        $settings = Setting::latest()->first();
        return view('account.orders.cart', compact('userCart', 'settings'));
    }


    public function addtocart(Request $request)
    {
        $data = $request->all();
        $ip = $request->ip();
        $total = $data['price'] * $data['quantity'];
        $pro_id = $data['product_id'];
        $checkstock = Product::where('id', $pro_id)
           ->first()->stock;
        if($checkstock <= 0){
            return redirect()->back()->with('flash_message_success', 'موجودی کافی نیست');
        }   
        $user_id = Auth::user()->id;

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

            return redirect('cart')->with('flash_message_success', 'محصول در سبد اضافه شده است!');
        }
    }


    public function updateCartQuantity($id = null, $quantity = null)
    {
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
        //echo $getProductSKU->product_id;die;

        //echo $getProductStock;die;
        $updated_quantity = $getProductSKU->quantity + $quantity;
        DB::table('carts')->where('id', $id)->increment('quantity', $quantity);
        $checkorder = Cart::where(['id' => $id])->count();
//        if ($checkorder > 0) {
//            $cart = DB::table('carts')->where('id', $id)->first();
//            $total = $cart->quantity * $cart->total;
//            DB::table('orders')->where('id', $id)->update(['total' => $total]);
//        }
        return redirect('cart')->with('flash_message_success', 'مقدار محصول در سبد به روز شد!');

    }


    public function delCartQuantity($id = null)
    {
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
        //echo $getProductSKU->product_id;die;

        //echo $getProductStock;die;
        DB::table('carts')->where('id', $id)->delete();
        return redirect('cart')->with('flash_message_success', 'محصول از سبد حذف شد');
    }


    public function deleteCartProduct($id = null)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('orders')->where('cart_id', $id)->delete();
        DB::table('carts')->where('id', $id)->delete();
        return redirect('cart')->with('flash_message_success', 'محصول از سبدتان حذف شد ');
    }


    public function shippings(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userCart = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->get();
            $count = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->count();

            $userDetail = User::find($user_id);
            $userProfileDetail = \App\Profile::with('user')->where('user_id', $user_id)->first();
        }

        //echo $count;die;
        if ($count == 0) {
            return redirect('cart')->with('flash_message_success', 'محصول در سبد خرید نیست');
        }
        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $userdi = User::where('id', $product->user_id)->first();
            $userCart[$key]->cover = $productDetails->cover;
            $userCart[$key]->price = $productDetails->price;
            $userCart[$key]->producttitle = $productDetails->title;

        }

        $address = Address::where(['user_id' => $user_id])->latest()->get();
        $settings = Setting::latest()->first();
        return view('account.orders.shippings', compact('userCart', 'settings', 'address', 'userDetail', 'userProfileDetail'));
    }

    //CHECK SELLER

    public function checkSeller(Request $request)
    {
        $user_id = Auth::user()->id;
        if ($request->isMethod('post')) {
            $data = $request->all();
//            echo '<pre>';
//            print_r($data);
//            die;
            //test
            //test
            $tracking_code = "EL" . Helper::generatecodes();
            if (empty($data['address_id'])) {
                return redirect()->back()->with('flash_message_error', 'ابتدا آدرس خود را انتخاب کنید یا ایجاد کنید ');
            }
            if (empty($data['seller_id'])) {
                $seller_id = null;
            } else {
                $seller_id = $data['seller_id'];
            }
            if (empty($data['transport'])) {
                return redirect()->back()->with('flash_message_error', 'لطفا نحوه حمل را انتخاب کنید');
            }
            $user_id = Auth::user()->id;
            $order = new Order();
            $order->user_id = $user_id;
            $order->identifiercode = $data['identifiercode'];
            $order->state_id = $data['state'];
            $order->seller_state = $seller_id;
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
            //send sms
            $phone = User::where(['id' => $user_id])->first()->phone;
            $from = "+9850001040987456";
            $pattern_code = "xwpjx7bnkx";
            $sub = array("code" => $tracking_code);
            $to = array($phone);
            $sendsms = new SmsHelper($from, $to, $sub, $pattern_code);
            //sendsms
            $agent = $data['seller_id'];
            $modifier = $data['identifiercode'];
            $total_order = $data['total'];
            $user_id_modifier = User::where(['username' => $modifier])->first()->id;
            $checkwallet = Wallet::where(['user_id' => $user_id_modifier])->count();
            $type = User::where(['username' => $modifier])->first()->type_identity;
            if ($checkwallet == 0) {
                $wallet_new = new Wallet();
                $wallet_new->user_id = $user_id_modifier;
                $wallet_new->save();
            }
            $marketer_parcent_total = $data['marketer_parcent_total'];

            if($type=="marketer"){
                if($marketer_parcent_total == 5){
                    $percent_out = ($total_order * (5 / 100));
                }else{
                    $percent_out = $marketer_parcent_total;
                }
            }else{
                $percent_out = ($total_order * (5 / 100));
            }

            //$percent = ($total_order * (5 / 100));

            $wallet_id = Wallet::where(['user_id' => $user_id_modifier])->first()->id;
            if (empty($agent)) {
                $chargedeposit = Wallet::where('user_id', $user_id_modifier)->first()->deposit;
                $updatedeposit = $chargedeposit + $percent_out;
                Wallet::where(['user_id' => $user_id_modifier])->update([
                    'deposit' => $updatedeposit,
                ]);
            } else {
                $getseller_id = User::where(['username' => $agent])->first()->id;
                $mark = Marketer::where(['id' => $getseller_id])->first();
                if (empty($mark)) {
                    $mark = $mark->user_id;
                    $mark_username = $mark->username;
                    if ($user_id_modifier != $mark_username) {
                        $chargedeposit = Wallet::where('user_id', $user_id_modifier)->first()->deposit;
                        $updatedeposit = $chargedeposit + $percent_out;
                        Wallet::where(['user_id' => $user_id_modifier])->update([
                            'deposit' => $updatedeposit,
                        ]);
                    } else {
                        $chargedeposit = Wallet::where('user_id', $user_id_modifier)->first()->deposit;
                        $updatedeposit = $chargedeposit + $percent_out;
                        Wallet::where(['user_id' => $user_id_modifier])->update([
                            'deposit' => $updatedeposit,
                        ]);
                    }

                }
            }
            $total_countdown = $data['total_countdown'];
            if($total_countdown === 0){
                $total_countdown = 5;
            }
            $transaction_new = new Transaction();
            $transaction_new->user_id = $user_id_modifier;
            $transaction_new->wallet_id = $wallet_id;
            $transaction_new->order_id = $order_id;
            $transaction_new->amount = $percent_out ?? 0;
            $transaction_new->percent = $total_countdown;
            $transaction_new->save();

            DB::table('carts')->where('user_id', $data['user_id'])->delete();
            return redirect('payments');
        }
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userCart = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->get();
            $userCartcount = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->count();
            if ($userCartcount == 0) {
                return redirect('cart');
            }
            $userDetail = User::find($user_id);
            $userProfileDetail = \App\Profile::with('user')->where('user_id', $user_id)->first();
        }
        $total_orders = 0;
        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $userdi = User::where('id', $product->user_id)->first();
            $userCart[$key]->cover = $productDetails->cover;
            $userCart[$key]->category_id = $productDetails->category_id;
            $userCart[$key]->price = $productDetails->price;
            $userCart[$key]->producttitle = $productDetails->title;
            $identity = $userdi->identifiercode;
            $total = $productDetails->price * $userCart[$key]->quantity;
            $total_orders += $total;
        }
        $address = Address::where(['user_id' => $user_id])->latest()->get();
        //dd($userCart[0]->id);
        $state = Province::orderBy('name')->get();
        return view('account.orders.check_seller', compact('state', 'user_id', 'userCart', 'address','identity','total_orders'));
    }

    public function payments(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userCart = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->get();
            $userDetail = User::find($user_id);
            $userProfileDetail = \App\Profile::with('user')->where('user_id', $user_id)->first();
        }
        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $userdi = User::where('id', $product->user_id)->first();
            $userCart[$key]->cover = $productDetails->cover;
            $userCart[$key]->price = $productDetails->price;
            $userCart[$key]->producttitle = $productDetails->title;

        }

        $address = Address::where(['user_id' => $user_id])->latest()->get();
        $settings = Setting::latest()->first();
        $orders = Order::where(['user_id' => $user_id])->latest()->first();
        $prodcutorders = OrderProduct::where(['order_id' => $orders->id, 'user_id' => $user_id])->get();
        return view('account.orders.payments', compact('userCart', 'settings', 'address', 'userDetail', 'userProfileDetail', 'orders', 'prodcutorders'));
    }


    public function getsellers(Request $request)
    {
        $data = $request->all();
        $province_id = $_POST['state_id'];
        $city_id = 0;
        if (isset($_POST['city_id']))
            $city_id = $_POST['city_id'];

        //$cities = City::where('province', $province_id)->orderby('name')->get();
        $sellers = Marketer::where('state_id', $province_id)->orderby('user_id')->get();
        foreach ($sellers as $sellers) {
            $t = "";
            if ($city_id == $sellers->id) $t = 'selected';
            echo '<option value="' . $sellers->id . '" ' . $t . '>' . $sellers->user->username . '</option>';
        }
    }


    public function factor(Request $request, $id = null)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userCart = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->get();
            $userDetail = User::find($user_id);
            $userProfileDetail = \App\Profile::with('user')->where('user_id', $user_id)->first();
        }
        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $userdi = User::where('id', $product->user_id)->first();
            $userCart[$key]->cover = $productDetails->cover;
            $userCart[$key]->price = $productDetails->price;
            $userCart[$key]->producttitle = $productDetails->title;

        }
        $order = Order::where(['user_id' => $user_id, 'order_status' => 'Panding'])->latest()->first();
        $prodcutorders = OrderProduct::where(['order_id' => $order->id, 'user_id' => $user_id])->get();
        $address = Address::where(['user_id' => $user_id])->latest()->get();
        $settings = Setting::latest()->first();
        return view('account.orders.factor', compact('userCart', 'settings', 'address', 'userDetail', 'userProfileDetail', 'order', 'prodcutorders'));
    }

    public function referral(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            if($data['product_id'] == "none"){
                return redirect()->back();
            }
            $user_id = Auth::user()->id;

            //dd($data);
            DB::table('order_products')->where(['order_id' => $data['order_id']])->update(
                ['referral_text' => $data['referral_text']]
            );
            return redirect('/user/account');
        }
        $user_id = Auth::user()->id;
//->addDay(10)
        $orderall = Order::where(['user_id' => $user_id, 'order_status' => 'PAY-OK'])->where('updated_at', '<', Carbon::now())->get();
        //dd($orderall);
        return view('account.products.referral', compact('orderall'));
    }
}
