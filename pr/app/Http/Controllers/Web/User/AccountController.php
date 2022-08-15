<?php

namespace App\Http\Controllers\Web\User;

use App\Address;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Library\SmsHelper;
use App\Order;
use App\OrderProduct;
use App\Profile;
use App\Province;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Image;
use Session;
class AccountController extends Controller
{
    public function account(Request $request)
    {
        $settings = Setting::latest()->first();
        return view('account.users.account',compact('settings'));
    }
    public function showorder(Request $request)
    {
        $user_id = Auth::user()->id;
        $get = Order::where(['user_id' => $user_id])->latest()->get();
        $settings = Setting::latest()->first();
        return view('account.order.showorder',compact('get','settings'));
    }

    public function ordershow(Request $request,$id=null)
    {
        $user_id = Auth::user()->id;
        $order = Order::where(['user_id' => $user_id,'id' => $id])->first();
        $orderproduct = OrderProduct::where(['user_id' => $user_id,'order_id' => $order->id])->get();
        $settings = Setting::latest()->first();
        $userProfileDetail = \App\Profile::with('user')->where('user_id', $user_id)->first();
        $userDetail = User::find($user_id);
        return view('account.order.order',compact('order','settings','user_id','orderproduct','userProfileDetail','userDetail'));
    }

    public function showaddress()
    {
        $user_id = Auth::user()->id;
        //dd($user_id);
        $get = Address::where(['user_id' => $user_id])->latest()->get();
        $settings = Setting::latest()->first();
        return view('account.address.show',compact('get','settings'));
    }

    public function addaddress(Request $request)
    {
        $user_id = Auth::user()->id;
        if ($request->isMethod('post')) {
            $data = $request->all();
            $newadd = new Address();
            $newadd->user_id = $user_id;
            $newadd->city_id = $data['city_id'];
            $newadd->province_id = $data['province_id'];
            $newadd->address = $data['address'];
            $newadd->zip_code = $data['zip_code'];
            $newadd->tel = $data['tel'];
            $newadd->save();
            //send sms
            $phone = User::where(['id' => $user_id])->first()->phone;
            $user = User::where(['id' => $user_id])->first()->username;
            $from = "+9850001040987456";
            $pattern_code = "5kxlqze98h";
            $sub = array("user" => $user);
            $to = array($phone);
            //echo '<pre>'; print_r($sub);die;
            $sendsms = new SmsHelper($from, $to, $sub, $pattern_code);
            $sendsms->sendsms();
            //send sms
            return redirect()->back();
        }
        $settings = Setting::latest()->first();
        $province = Province::orderBy('name')->get();
        return view('account.address.add',compact('settings','province'));
    }

    public function editaddress(Request $request,$id=null)
    {
        $user_id = Auth::user()->id;
        if ($request->isMethod('post')) {
            $data = $request->all();
            Address::where(['id' => $id])->update([
              'province_id' => $data['province_id'],'city_id' => $data['city_id'],
                'address' => $data['address'],'zip_code' => $data['zip_code'],
                'tel' => $data['tel']
            ]);
            return redirect()->back()->with('flash_message_success', 'با موفقیت Address بروز  شد !!!');
        }
        $settings = Setting::latest()->first();
        $get = Address::where(['id' => $id])->first();
        $province = Province::orderBy('name')->get();
        return view('account.address.edit',compact('get','settings','province'));
    }

    public function deladdress($id=null)
    {
        Address::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', ' Address با موفقیت حذف شد');
    }

    public function profile(Request $request)
    {
        $user_id = Auth::user()->id;
        if ($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            $birth =  Helper::DateNameShamsiToConvertDateNumber($data['birth']);
            if (empty($data['path'])) {
                $profile_path = $data['avatar_img'];
            } else {
                $image_path = $data['path'];
                $image_del = $data['avatar_img'];
                if (!empty($image_del)) {
                    if (file_exists($image_del)) {
                        unlink($image_del);
                    }
                }
                $extension = $image_path->getClientOriginalExtension();
                $New_path = rand(111111, 999999999) . '.' . $extension;
                $path_path = 'upload' . '/' . 'users/' . 'profiles' . '/';
                $profile_path = $path_path . $New_path;
                if (!File::isDirectory($path_path)) {
                    File::makeDirectory($path_path, $mode = 0777, true, true);
                }
                Image::make($image_path)->resize(140, 140)->save($profile_path);

            }
            Profile::where(['user_id' => $user_id])->update([
                'nationalcode' => $data['nationalcode'],'birth' => $birth,'path' => $profile_path
            ]);
            return redirect()->back();
        }
        $user = Profile::where('user_id',$user_id)->first();
        //dd($user);
        $settings = Setting::latest()->first();
        return view('account.profiles.profile',compact('settings','user'));
    }

    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $old_pwd = User::where('id', Auth::User()->id)->first();
            $current_pwd = $data['current_pwd'];
            if (Hash::check($current_pwd, $old_pwd->password)) {
                // Update password
                $new_pwd = bcrypt($data['new_pwd']);
                User::where('id', Auth::User()->id)->update(['password' => $new_pwd]);
                return redirect()->back()->with('flash_message_success', ' رمز عبور با موفقیت به روز شد!');
            } else {
                return redirect()->back()->with('flash_message_error', 'کلمه عبور فعلی نادرست است!');
            }
        }
        $user_id = Auth::user()->id;
        //$userDetails = User::find($user_id);
        $userDetails = User::where('id', $user_id)->first();
        Session::put('pages', 'updatePassword');
        return view('account.profiles.update_password', compact('userDetails'));
    }

    public function chkUserPassword(Request $request)
    {
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        $current_password = $data['current_pwd'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id', $user_id)->first();
        if (Hash::check($current_password, $check_password->password)) {
            echo "true";
            die;
        } else {
            echo "false";
            die;
        }
    }
}
