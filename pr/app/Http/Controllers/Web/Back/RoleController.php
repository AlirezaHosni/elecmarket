<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\Library\Helper;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function PHPUnit\Framework\isEmpty;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $name = Helper::slugfix($data['name']);
            Role::create(['name' => $name]);

            return redirect('ad/roles')->with('flash_message_success', 'با موفقیت ایجاد شد');

        }
        return view('admin.roles.add');
    }

    public function delete($id = null)
    {
        Role::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', ' حذف  شد');
    }

    public function rolesindex(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            ///dd($data);
            $permissions = $data['permissions'];
            $roles = Role::where(['id' => $id])->first();
            $roles->syncPermissions($permissions);
        }
        $role = Role::where('id', $id)->first();
        $permissions = Permission::orderBy('title')->get();
        $per = $role->permissions;

        if(count($per)==0){
            $index = null;
        }else{
            foreach($per as $row){
                $index[] = $row->name;
            }
        }

        return view('admin.roles.permissions', compact('permissions', 'role','index'));
    }

}
