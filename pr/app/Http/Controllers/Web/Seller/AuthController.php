<?php

namespace App\Http\Controllers\Web\Seller;

use App\Http\Controllers\Controller;
use App\Library\SmsHelper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $adminCount = User::where(['username' => $data['username'], 'is_seller' => 1])->count();
            //dd($adminCount);
            $phone = $data['username'];
            if ($adminCount > 0) {
                if (Auth::attempt(['username' => $phone, 'password' => $data['password']])) {
                    $userStatus = User::where('username', $data['username'])->first();
                    if ($userStatus->status == 0) {
                        return redirect()->back()->with('flash_message_error', 'حساب کاربری شما فعال نیست لطفا ایمیل خود را فعال کنید');
                    }
                    Session::put('sellersSession', $data['username']);
                    $userStatususer = User::where('id', $userStatus->id)->first();

                    $from = "+9850001040987456";
                    $pattern_code = "0f24rj2lz0";
                    //$sub = $userStatususer->username;
                    $sub = array("name" => $userStatususer->username);
                    $to = array($phone);
                    //echo '<pre>'; print_r($sub);die;
                    //$sendsms = new SmsHelper($from,$to,$sub,$pattern_code);
                    //$sendsms->sendsms();
                    return redirect('/sellers/dashboard');
                } else {
                    return redirect()->back()->with('flash_message_error', 'نام کاربری یا رمز ورود نامعتبر است');
                }
            } else {
                //echo "failed"; die;
                return redirect('/sellers/login')->with('flash_message_error', 'در حال حاضر شما اجازه ورود ندارید');
            }

        }
        return view('sellers.auth.login');
    }

    public function lagout()
    {
        Auth::logout();
        Session::forget('sellersSession');
        Session::forget('session_id');
        return redirect('/sellers/login')->with('flash_message_error', 'با موفقیت از پنل خارج شده اید!!!');
    }
}
