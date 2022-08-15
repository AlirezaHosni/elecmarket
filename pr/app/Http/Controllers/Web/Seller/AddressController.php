<?php

namespace App\Http\Controllers\Web\Seller;

use App\Address;
use App\City;
use App\Http\Controllers\Controller;
use App\Library\SmsHelper;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function showAddress(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $address = new Address();
            $address->user_id = $data['user_id'];
            $address->city_id = $data['city_id'];
            $address->province_id = $data['province_id'];
            $address->address = $data['address'];
            $address->zip_code = $data['zip_code'];
            $address->tel = $data['tel'];
            $address->save();
            return redirect()->back()->with('flash_message_success', 'آدرس ایجاد شد');
        }
        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)->get();
        $pr = Province::orderBy('name')->get();
        return view('sellers.address.address_show', compact('address', 'pr', 'user_id'));
    }

    public function updateAddress(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $user_id = Auth::user()->id;
            Address::where(['id' => $id])->update([
                'address' => $data['address'],'zip_code' => $data['zip_code'],'tel' => $data['tel']
            ]);
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
            return redirect()->back()->with('flash_message_success', 'آدرس ویرایش شد');
        }
        $user_id = Auth::user()->id;
        $address = Address::where('id', $id)->first();
        return view('sellers.address.address_update', compact('address', 'user_id'));
    }

    public function changeCity(Request $request)
    {
        $data = $request->all();
        $province_id = $_POST['province_id'];


        $city_id = 0;
        if (isset($_POST['city_id']))
            $city_id = $_POST['city_id'];

        $cities = City::where('province', $province_id)->orderby('name')->get();
        foreach ($cities as $city) {
            $t = "";
            if ($city_id == $city->id) $t = 'selected';
            echo '<option value="' . $city->id . '" ' . $t . '>' . $city->name . '</option>';
        }
    }

    public function delAddress($id=null)
    {
        Address::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'آدرس با موفقیت حذف شد !!!');
    }
}
