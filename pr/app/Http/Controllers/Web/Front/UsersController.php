<?php

namespace App\Http\Controllers\Web\Front;

use App\Address;
use App\City;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Library\SmsHelper;
use App\Profile;
use App\Province;
use App\Sms;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Session;

class UsersController extends Controller
{
    public function getcity(Request $request)
    {
        $data = $request->all();
        $province_id = $_POST['province_id'];
        $city_id = 0;
//        if (isset($_POST['city_id']))
//            $city_id = $_POST['city_id'];

        $cities = City::where('province', $province_id)->orderby('name')->get();

        foreach ($cities as $city) {
            $t = "";
            if ($city_id == $city->id) $t = 'selected';
            echo '<option value="' . $city->id . '" ' . $t . '>' . $city->name . '</option>';
        }
        //echo "<pre>"; print_r($data); die;


    }

    public function checkdonator(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $donator = $_POST['donator'];
        if (isset($_POST['donator']))
            $donator = $_POST['donator'];
        //$checkuser = CategoryUser::where(['code_seller_seller' => $donator])->count();
        $checkuser = User::where(['identifiercode' => $donator])->count();

        if ($checkuser > 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function showdonator(Request $request)
    {
        $data = $request->all();
        $donator = $_POST['donator'];
        if (isset($_POST['donator']))
            $donator = $_POST['donator'];
        //$checkuser = CategoryUser::where(['code_seller_seller' => $donator])->count();
        $checkuser = User::where(['identifiercode' => $donator])->count();
        if ($checkuser > 0) {
            $usersdonator = User::where(['identifiercode' => $donator])->first();
            $username = $usersdonator->username;
            $phone = $usersdonator->phone;
            $firstname = $usersdonator->profiles->first_name ?? '';
            $lastname = $usersdonator->profiles->last_name ?? '';
            $msg = "";
            $msg .= "<input  value='$donator' type='hidden' name='donator'>";
            $msg .= "<div class='bn_rfrr_group'>
                                                <label for=''>نام کاربری معرف</label>
                                                <input disabled class='bn_rfrrg_input' value='$username' type='text' >
                                            </div>";
            $msg .= "<div class='bn_rfrr_group'>
                                                <label for=''>شماره تماس معرف  </label>
                                                <input disabled class='bn_rfrrg_input' value='$phone' type='text' >
                                            </div>";
            $msg .= "<div class='bn_rfrr_group'>
                                                <label for=''>نام کوچک معرف    </label>
                                                <input disabled class='bn_rfrrg_input' value='$firstname' type='text' >
                                            </div>";
            $msg .= "<div class='bn_rfrr_group'>
                                                <label for=''> فامیل معرف    </label>
                                                <input disabled class='bn_rfrrg_input' value='$lastname' type='text'>
                                            </div>";

            echo $msg;
        } else {
            echo "false";
        }
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['email'])) {
                $email = '';
            } else {
                $email = $data['email'];
            }
            if (empty($data['pobox'])) {
                $pobox = '';
            } else {
                $pobox = $data['pobox'];
            }
            if (empty($data['tel'])) {
                $tel = '';
            } else {
                $tel = $data['tel'];
            }
            $donator = $_POST['donator'];
            if (isset($_POST['donator']))
                $donator = $_POST['donator'];
            //$checkuser = CategoryUser::where(['code_seller_seller' => $donator])->count();
            $checkuser = User::where(['identifiercode' => $donator])->count();
            if ($checkuser > 0) {
                //check code moarf
                $phone = $data['cellPhone'];
                $email = $email;
                $tavalodRooz = Helper::DateNameShamsiToConvertDateNumber($data['tavalodRooz']);
                //echo "<pre>"; print_r($data); die;
                $checkuser = User::where(['phone' => $phone])->count();
                if ($checkuser == 0) {
                    $checkuseremail = User::where(['email' => $email])->count();
//                    if ($checkuseremail > 0) {
//                        return redirect('/user/login')->with('flash_message_success', 'کاربر قبلا ثبت نام کرده است');
//                    } else {
                    $phones = $data['cellPhone'];
                    $string_2 = substr($phones, 5, 6);
                    $username = "EM" . $string_2;
                    //$pass = rand(111111, 9999999);
                    //new  user
                    $newuser = new User();
                    $newuser->username = $username;
                    $newuser->email = $email;
                    $newuser->phone = $phone;
                    $newuser->identifiercode = $donator;
                    $newuser->password = bcrypt($data['password']);
                    $newuser->status = 1;

                    $newuser->type_identity = "user";
                    $newuser->save();
                    $userId = User::latest()->first()->id;
                    //send sms
                    $from = "+9850001040987456";
                    $pattern_code = "acmxqtt9md";
                    $sub = array("pass" => $data['password'], "user" => $username);
                    $to = array($phone);
                    //echo '<pre>'; print_r($sub);die;
                    $sendsms = new SmsHelper($from, $to, $sub, $pattern_code);
                    $sendsms->sendsms();
                    //sendsms
                    //profile
                    $newpro = new Profile();
                    $newpro->user_id = $userId;
                    $newpro->first_name = $data['name'];
                    $newpro->last_name = $data['lname'];
                    $newpro->fname = $data['fname'];
                    $newpro->nationalcode = $data['codeMeli'];
                    $newpro->birth = $tavalodRooz;
                    $newpro->gender = $data['jens'];
                    $newpro->save();
                    //address
                    $newaddress = new Address();
                    $newaddress->user_id = $userId;
                    $newaddress->city_id = $data['city'];
                    $newaddress->province_id = $data['province'];
                    $newaddress->address = $data['address'];
                    $newaddress->zip_code = $pobox;
                    $newaddress->tel = $tel;
                    $newaddress->save();
                    return redirect('/user/login')->with('flash_message_success', 'کاربر با موفقیت ثبت شد');
                    // }

                } else {
                    return redirect('/user/login')->with('flash_message_success', 'کاربر قبلا ثبت نام کرده است');
                }
            } else {
                return redirect('/user/register')->with('flash_message_success', 'کد معرف شما مشکل داشته است');
            }

        }
        $province = Province::orderBy('name', 'desc')->get();
        return view('front.auth.register', compact('province'));
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
                $userStatus = User::where('username', $data['username'])->first();
                if ($userStatus->is_seller == 1) {
                    return redirect('/sellers/login')->with('flash_message_error', 'از طریق پنل فروشندگان وارد شوید');
                }
                if ($userStatus->status == 0) {
                    return redirect()->back()->with('flash_message_error', 'حساب کاربری شما فعال نیست ');
                }
                Session::put('frontSession', $data['username']);

                if (!empty(Session::get('frontSession'))) {
                    $session_id = Session::get('frontSession');
                    $user_id = User::where('username', $data['username'])->first();
                    //DB::table('carts')->where('session_id', $session_id)->update(['user_id' => $user_id->id]);
                }
                //$phone = $data['username'];
                $from = "+9850001040987456";
                $pattern_code = "0f24rj2lz0";
                //$sub = $userStatususer->username;
                $sub = array("name" => $userStatus->username);
                $to = array($userStatus->phone);
                //echo '<pre>'; print_r($sub);die;
                //$sendsms = new SmsHelper($from, $to, $sub, $pattern_code);
                //$sendsms->sendsms();
                return redirect('/user/account');
            } else {
                return redirect()->back()->with('flash_message_error', 'نام کاربری یا رمز ورود نامعتبر است');
            }
        }
        return view('front.auth.login');
    }

    public function forgetpass(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $phone = Helper::convertToEnNumber($request->phone);
            $checkstatus = User::where(['status' => 1, 'is_admin' => 0, 'phone' => $phone])->count();
            if ($checkstatus > 0) {
                Session::put('phoneSession', $phone);
                $id_user = User::where(['phone' => $phone])->first()->id;
                $code = mt_rand(10000, 99999);
                $newsmsm = new Sms();
                $newsmsm->user_id = $id_user;
                $newsmsm->sms = $code;
                $newsmsm->save();
                //sendsms
                $from = "+9850001040987456";
                $pattern_code = "ku43mnjqdc";
                $sub = array("verifycode" => $code);
                $to = array($phone);
                $sendsms = new SmsHelper($from, $to, $sub, $pattern_code);
                $sendsms->sendsms();
                return redirect('user/otp');
            } else {
                return redirect('/user/login');
                //return redirect()->back()->with('flash_message_error', 'حساب شما فعال نمی باشد');
            }
        }
        return view('front.auth.forget');
    }

    public function Otp(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $phone = $data['phone'];
            $userDetails = User::where('phone', $phone)->first();
            //$mypass = mt_rand(100000, 999999);
            $checksms = Sms::where(['user_id' => $userDetails->id, 'sms' => $data['code']])->count();
            if ($checksms > 0) {
                $mypass = mt_rand(1000000, 9999999);
                User::where('phone', $phone)->update(['password' => bcrypt($mypass)]);
                $from = "+9850001040987456";
                $pattern_code = "x6idu71m2b";
                $sub = array("code" => $mypass);
                $to = array($phone);
                $sendsms = new SmsHelper($from, $to, $sub, $pattern_code);
                $sendsms->sendsms();
                return redirect('/user/login');
            } else {
                return redirect('/user/otp');
            }
        }
        $phone = Session::get('phoneSession');
        //$userDetails = User::where('phone', $phone)->first();
        //$phone = $userDetails->phone;
//        $mypass = mt_rand(100000, 999999);
//        $checksms = Sms::where('user_id', $userDetails->id)->count();
//        if ($checksms == 0) {
//            User::where('phone', $phone)->update(['password' => bcrypt($mypass)]);
//            $from = "+9850001040987456";
//            $pattern_code = "0f24rj2lz0";
//            //$sub = $userStatususer->username;
//            $sub = array("name" => $userDetails->username);
//            $to = array($phone);
//            //echo '<pre>'; print_r($sub);die;
//            $sendsms = new SmsHelper($from,$to,$sub,$pattern_code);
//            $sendsms->sendsms();
//            return redirect('login');
//        }
        return view('front.auth.otp', compact('phone'));
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('session_id');
        return redirect('/');
    }
}
