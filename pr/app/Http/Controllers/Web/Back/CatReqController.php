<?php

namespace App\Http\Controllers\Web\Back;

use App\CatReq;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
class CatReqController extends Controller
{
    public function all()
    {
        $cat = CatReq::latest()->get();
        return view('admin.catreqs.all', compact('cat'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $slugfix = Helper::slugfix($data['title']);
            //uploads
            if(empty($data['cover'])){
                $cover_path = "";
            }else{
                $image_path = $data['cover'];
                $extension = $image_path->getClientOriginalExtension();
                $New_path = rand(111111, 999999999) . '.' . $extension;
                $path_path = 'upload/forms/' . 'cover'. '/';
                $cover_path =  $path_path .$New_path;
                if (!File::isDirectory($path_path)) {
                    File::makeDirectory($path_path, $mode = 0777, true, true);
                }
                Image::make($image_path)->resize(1120, 460)->save($cover_path);
            }
            $brands = new CatReq();
            $brands->title = $data['title'];
            $brands->body = $data['body'];
            $brands->bodyform = $data['bodyform'];
            $brands->slug = $slugfix;
            $brands->img = $cover_path;
            $brands->body = $data['body'];
            $brands->save();
            return redirect('ad/reqforms/view')->with('flash_message_success', 'با موفقیت   ایجاد شد');
        }
        return view('admin.catreqs.add');
    }

    public function edit(Request $request,$id=null)
    {
        if ($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
           // $slugfix = Helper::slugfix($data['title']);
            //uploads
            if(empty($data['cover'])){
                $cover_path = $data['cover_img'];
            }else{
                $image_path = $data['cover'];
                $extension = $image_path->getClientOriginalExtension();
                $New_path = rand(111111, 999999999) . '.' . $extension;
                $path_path = 'upload/forms/' . 'cover'. '/';
                $cover_path =  $path_path .$New_path;
                if (!File::isDirectory($path_path)) {
                    File::makeDirectory($path_path, $mode = 0777, true, true);
                }
                Image::make($image_path)->resize(1120, 460)->save($cover_path);
            }
            CatReq::where(['id' => $id])->update([
                'title' => $data['title'],'body' => $data['body'],'bodyform' => $data['bodyform'],
                'img' => $cover_path,
            ]);
            return redirect('ad/reqforms/view')->with('flash_message_success', 'با موفقیت ویرایش شد');
        }
        $req = CatReq::where(['id' => $id])->first();
        return view('admin.catreqs.edit', compact('req'));
    }
    public function delete($id=null)
    {
        $pages =CatReq::where('id', $id)->first();
        $newpath = $pages->cover;
        if (file_exists($newpath)) {
            unlink($newpath);
        }
        CatReq::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', ' با موفقیت حذف شد !!!');
    }
}
