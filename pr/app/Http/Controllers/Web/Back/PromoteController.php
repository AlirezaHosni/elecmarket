<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\Promte;
use App\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PromoteController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['url'])) {
                $url = null;
            } else {
                $url = $data['url'];
            }
            //echo "<pre>"; print_r($data); die;
            $check = Promte::where(['type' => $data['promote_type'] ])->count();
            if($check > 0){
                return redirect('ad/promotes/view-promotes')->with('flash_message_success', 'پروموت تکراری مباشد لطفا پروموت قبلی فقط ویرایش کنید');
            }else{
                $slider = new Promte();
                $slider->type = $data['promote_type'];
                // Upload Image
                //uploads
                if (!@empty($data['cover'])) {
                    $image_path = $data['cover'];
                    $extension = $image_path->getClientOriginalExtension();
                    $New_path = rand(111111, 999999999) . '.' . $extension;
                    $path_path = 'upload' .'/' .'promotes/';
                    $large_path =  $path_path .$New_path;
                    if (!File::isDirectory($path_path)) {
                        File::makeDirectory($path_path, $mode = 0777, true, true);
                    }
                    Image::make($image_path)->resize(270, 212)->save($large_path);
                }else{
                    return redirect()->back();
                }

                if (empty($data['status'])) {
                    $status = '0';
                } else {
                    $status = '1';
                }
                $slider->path = $large_path;
                $slider->status = $status;
                $slider->url = $url;
                $slider->save();
                return redirect('ad/promotes/view-promotes')->with('flash_message_success', ' جدید ایجاد شد پرموت');
            }

        }
        return view('admin.promotes.add');
    }

    public function edit(Request $request,$id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if (empty($data['url'])) {
                $url = null;
            } else {
                $url = $data['url'];
            }
            if(empty($data['cover'])){
                $large_path = $data['cover_img'];
            }else{
                $cover_path = $data['cover_img'];
                //echo '<pre>'; print_r($cover_path);die;
                if (file_exists($cover_path)) {
                    unlink($cover_path);
                }
                if ($request->hasFile('cover')) {
                    //uploads

                    $image_path = $data['cover'];

                    $extension = $image_path->getClientOriginalExtension();
                    $New_path = rand(111111, 999999999) . '.' . $extension;
                    $path_path = 'upload' .'/' .'promotes/';
                    $large_path =  $path_path .$New_path;
                    if (!File::isDirectory($path_path)) {
                        File::makeDirectory($path_path, $mode = 0777, true, true);
                    }
                    Image::make($image_path)->resize(860, 354)->save($large_path);
                    //upoload
                }
            }
            Promte::where(['id' => $id])->update([
                'path' =>  $large_path,'status' => $status, 'type' => $data['promote_type'],
                'url' => $url
            ]);
            return redirect('ad/promotes/view-promotes')->with('flash_message_success', ' ویرایش  شد پرموت');
        }
        $pros = Promte::where('id', $id)->first();
        return view('admin.promotes.edit',compact('pros'));
    }

    public function all()
    {
        $settings = Setting::first();
        $pro = Promte::latest()->get();
        return view('admin.promotes.all',compact('pro', 'settings'));
    }

    public function delete($id=null)
    {
        $productImage = Promte::where('id', $id)->first();
        $cover = $productImage->path;
        // Delete Large Image if not exists in Folder
        if (file_exists($cover)) {
            unlink($cover);
        }
        // Delete Large Image if not exists in Folder
        Promte::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', ' محصول با موفقیت حذف شد');
    }

    public function changePromoteCover(Request $request)
    {
        $data = $request->all();

        if (empty($data['cover'])) {
            $large_path = $data['cover_img'];
        } else {
            $cover_path = $data['cover_img'];
            //echo '<pre>'; print_r($cover_path);die;
            if (file_exists($cover_path)) {
                unlink($cover_path);
            }
            if ($request->hasFile('cover')) {
                //uploads
                $image_path = $data['cover'];
                $extension = $image_path->getClientOriginalExtension();
                $New_path = rand(111111, 999999999) . '.' . $extension;
                $path_path = 'assets' . '/' . 'front/' . 'images' . '/';
                $large_path = $path_path . $New_path;
                if (!File::isDirectory($path_path)) {
                    File::makeDirectory($path_path, $mode = 0777, true, true);
                }
                Image::make($image_path)->resize(860, 354)->save($large_path);
                //upoload
            }
        }
        $settings = Setting::first();
        $settings->logo_path = $large_path;
        $settings->save();
    }
}
