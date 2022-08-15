<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function all()
    {
        $manu = Menu::latest()->paginate(5);
        return view('admin.menus.all',compact('manu'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')){
            $data = $request->all();
            //echo '<pre>'; print_r($data);die;
            $title = $data['title'];
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            //uploads
            //uploads
            //save
            $pages = new Menu();
            $pages->title = $title;
            $pages->menu_type = $data['menu_type'];
            $pages->page_id = $data['page_id'];
            $pages->status = $status;
            $pages->save();
            return redirect('/ad/menus/view')->with('flash_message_success', 'menu ایجاد شد');
        }
        $page = Page::latest()->get();
        return view('admin.menus.add',compact('page'));
    }

    public function edit(Request $request,$id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $title = $data['title'];
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }

            Menu::where(['id' => $id])->update([
                'status' => $status,'title' => $title,'menu_type' => $data['menu_type'],'page_id' => $data['page_id']
            ]);
            return redirect('ad/menus/view')->with('flash_message_success', 'با موفقیت menus بروز  شد !!!');
        }
        $manu = Menu::where('id', $id)->first();
        $page = Page::latest()->get();
        return view('admin.menus.edit',compact('manu','page'));
    }

    public function delete($id=null)
    {

        Menu::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', ' Menu با موفقیت حذف شد');
    }
}
