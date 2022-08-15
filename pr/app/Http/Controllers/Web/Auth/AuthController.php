<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function Login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
//           echo "<pre>"; print_r($data); die;
            if (preg_match('/^(?:98|\+98|0098|0)?9[0-9]{9}$/', $request->phone)) {
                $phone = $data['phone'];
                $password = $data['password'];
                $adminCount = User::where(['phone' => $data['phone'],'is_admin' => 1])->count();
                if ($adminCount > 0) {
                    if (Auth::attempt(['phone' => $phone, 'password' => $password])) {

                        $userStatus = User::where('phone', $data['phone'])->first();
                        if ($userStatus->status == 0) {
                            return redirect()->back()->with('flash_message_error', 'حساب کاربری شما فعال نیست لطفا ایمیل خود را فعال کنید');
                        }
                        Session::put('adminSession', $data['phone']);
                        $userStatususer = User::where('id', $userStatus->id)->first();
                        return redirect('/ad/dashboard');
                    } else {
                        return redirect()->back()->with('flash_message_error', 'نام کاربری یا رمز ورود نامعتبر است');
                    }
                }else{
                    //echo "failed"; die;
                    return redirect('/ad/login')->with('flash_message_error', 'در حال حاضر شما اجازه ورود ندارید');
                }
            } else {

            }
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('adminSession');
        Session::forget('session_id');
        return redirect('/ad/login')->with('flash_message_error', 'با موفقیت از پنل خارج شده اید!!!');
    }
}
