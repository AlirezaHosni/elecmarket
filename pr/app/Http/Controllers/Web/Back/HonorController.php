<?php

namespace App\Http\Controllers\Web\Back;

use App\Honor;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
class HonorController extends Controller
{
    public function allhonors()
    {
        $honor = Honor::latest()->get();
        return view('admin.honors.all',compact('honor'));
    }

    public function addhonors(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo '<pre>'; print_r($data);die;
            $title = $data['title'];
            $slug = Helper::slugfix($data['title']);
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if(empty($data['cover'])){
                $large_path = "";
            }else {
                $image_path = $data['cover'];
                $extension = $image_path->getClientOriginalExtension();
                $New_path = rand(111111, 999999999) . '.' . $extension;
                $path_path = 'upload/honors' . '/';
                $large_path = $path_path . $New_path;
                if (!File::isDirectory($path_path)) {
                    File::makeDirectory($path_path, $mode = 0777, true, true);
                }
                Image::make($image_path)->resize(140, 140)->save($large_path);
            }
            $news = new Honor();
            $news->title = $title;
            $news->slug = $slug;
            $news->description = $data['description'];
            $news->cover = $large_path;
            $news->status = $status;
            $news->save();
            return redirect('/ad/honors/view')->with('flash_message_success', 'honors ایجاد شد');
        }
        return view('admin.honors.add');
    }

    public function edithonors(Request $request,$id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo '<pre>'; print_r($data);die;
            $title = $data['title'];
            $slug = Helper::slugfix($data['title']);
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if(empty($data['cover'])){
                $large_path = "";
            }else {
                $image_path = $data['cover'];
                $extension = $image_path->getClientOriginalExtension();
                $New_path = rand(111111, 999999999) . '.' . $extension;
                $path_path = 'upload/honors' . '/';
                $large_path = $path_path . $New_path;
                if (!File::isDirectory($path_path)) {
                    File::makeDirectory($path_path, $mode = 0777, true, true);
                }
                Image::make($image_path)->resize(140, 140)->save($large_path);
            }
            Honor::where(['id' => $id])->update([
                'status' => $status,'title' => $title,'description' => $data['description'],'cover' => $large_path
            ]);
            return redirect('/ad/honors/view')->with('flash_message_success', 'honors ایجاد شد');
        }
        $honors = Honor::where('id', $id)->first();
        return view('admin.honors.edit',compact('honors'));
    }

    public function deletehonors($id=null)
    {
        $pages =Honor::where('id', $id)->first();
        $newpath = $pages->cover;
        if (file_exists($newpath)) {
            unlink($newpath);
        }
        Honor::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', ' honors با موفقیت حذف شد');
    }
}
