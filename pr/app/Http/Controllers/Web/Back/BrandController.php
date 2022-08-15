<?php

namespace App\Http\Controllers\Web\Back;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
class BrandController extends Controller
{
    public function allBrands()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brands.all', compact('brands'));
    }

    public function addBrand(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $slugfix = Helper::slugfix($data['title']);
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            //uploads
            if(empty($data['cover'])){
                $cover_path="";
            }else{
                $image_path = $data['cover'];
                $extension = $image_path->getClientOriginalExtension();
                $New_path = rand(111111, 999999999) . '.' . $extension;
                $path_path = 'upload/brands/' . 'cover'. '/';
                $cover_path =  $path_path .$New_path;
                if (!File::isDirectory($path_path)) {
                    File::makeDirectory($path_path, $mode = 0777, true, true);
                }
                Image::make($image_path)->resize(1120, 460)->save($cover_path);
            }

            //uploads
            $brands = new Brand();
            $brands->title = $data['title'];
            $brands->body = $data['body'];
            $brands->slug = $slugfix;
            $brands->cover = $cover_path;
            $brands->meta_title = $data['title'];
            $brands->meta_description = $data['body'];
            $brands->meta_keywords = $data['title'];
            $brands->status = $status;
			 $brands->brand_type = $data['brand_type'];
            $brands->save();
            return redirect('ad/brands/view')->with('flash_message_success', 'با موفقیت برند  ایجاد شد');
        }
        return view('admin.brands.add');
    }

    public function editBrand(Request $request,$id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            //uploads
            if(empty($data['cover'])){
                $cover_path = $data['cover_img'];
            }else{
                $cover_paths = $data['cover_img'];
                //echo '<pre>'; print_r($cover_path);die;
                if (file_exists($cover_paths)) {
                    unlink($cover_paths);
                }
                $image_path = $data['cover'];
                $extension = $image_path->getClientOriginalExtension();
                $New_path = rand(111111, 999999999) . '.' . $extension;
                $path_path = 'upload/brands/' . 'cover'. '/';
                $cover_path =  $path_path .$New_path;
                if (!File::isDirectory($path_path)) {
                    File::makeDirectory($path_path, $mode = 0777, true, true);
                }
                Image::make($image_path)->resize(1120, 460)->save($cover_path);
            }
            //uploads
            Brand::where(['id' => $id])->update([
                'status'=>$status,'title' => $data['title'], 'body' => $data['body'],'brand_type' => $data['brand_type'],'cover' => $cover_path
            ]);
            return redirect('ad/brands/view')->with('flash_message_success', 'با موفقیت برند  بروز شد!!!');
        }
        $brands = Brand::where('id',$id)->first();
        return view('admin.brands.edit',compact('brands'));
    }

    public function deleteBrand($id=null)
    {
        $pages =Brand::where('id', $id)->first();
        $newpath = $pages->cover;
        if (file_exists($newpath)) {
            unlink($newpath);
        }
        Brand::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'برند با موفقیت حذف شد !!!');
    }
}
