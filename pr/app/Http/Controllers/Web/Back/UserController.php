<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where(['is_admin' => '1'])->latest()->get();
        //echo "<pre>"; print_r($saller); die;
        return view('admin.users.all', compact('user'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            $password = $data['password'];
            $phones = $data['phone'];
            $string_2 = substr($phones, 5, 6);
            $username = "EM" . $string_2;

            $checkusert = User::where('phone', $data['phone'])->count();
            if ($checkusert > 0) {
                return redirect()->back()->with('flash_message_success', 'شماره تماس تکرای است ');
            } else {
                //create user
                $user = new User();
                $user->username = $username;
                $user->phone = $data['phone'];
                $user->password = bcrypt($password);
                $user->status = $status;
                $user->is_seller = '0';
                $user->is_admin = '1';
                $user->type_identity = "Admin";
                $user->save();
                $user_id = User::latest()->first()->id;
                $profile = new Profile();
                $profile->user_id = $user_id;
                $profile->first_name = $data['first_name'];
                $profile->last_name = $data['last_name'];
                $profile->nationalcode = $data['nationalcode'];
                $profile->gender = $data['gender'];
                $profile->save();
                return redirect('ad/users')->with('flash_message_success', 'کاربری ایجاد شد');
            }

        }
        return view('admin.users.add');
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $password = $data['password'];
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            $pass = bcrypt($password);
            User::where(['id' => $id])->update([
                'status' => $status, 'password' => $pass, 'username' => $data['username']
            ]);
            return redirect('ad/users')->with('flash_message_success', 'کاربری ویرایش شد');
        }
        $user = User::where('id', $id)->first();
        return view('admin.users.edit', compact('user'));
    }

    public function delete($id)
    {
        User::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'کاربر با موفقیت حذف شد !!!');
    }

    public function showBank(Request $request)
    {
        //$user = User::orderBy('phone')->get();
        $user = DB::table('users')->orderBy('phone')->select('username', 'phone', 'card_bank', 'code_shaba')->get();
        //dd($user);
        return view('admin.banks.show', compact('user'));
    }

    public function roles(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $user_id = $data['user_id'];
            $roles = $data['roles'];
            $role = Role::where('id', $roles)->first();
            $permissions = $role->permissions;
            $users = User::where('id', $user_id)->first();
            $users->syncRoles($roles);
            $users->syncPermissions($permissions);
            return redirect('ad/users')->with('flash_message_success', 'نقش اضافه شد');
        }
        $user = User::where('id', $id)->first();
        $roles = Role::latest()->get();
        $rolesname = $user->roles;
        if(count($rolesname) > 0){
            $rolesname=  $rolesname[0]['name'];
        }else{
            $rolesname= null;
        }
        return view('admin.users.roles', compact('user', 'roles','rolesname'));
    }
}
