<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\Library\Helper;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //$roles = $data['roles'];
            $name = Helper::slugfix($data['name']);
            Permission::create(['name' => $name,'title' => $data['title']]);
//            $roles = Role::where(['id' => $roles])->first();
//            $roles->givePermissionTo($name);
            return redirect('ad/permissions')->with('flash_message_success', 'با موفقیت ایجاد شد');

        }
        $roles = Role::latest()->get();
        return view('admin.permissions.add', compact('roles'));
    }

    public function delete($id = null)
    {
        Permission::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', ' حذف  شد');
    }
}
