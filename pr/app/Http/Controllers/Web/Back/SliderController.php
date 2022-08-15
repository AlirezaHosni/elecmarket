<?php

namespace App\Http\Controllers\Web\Back;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;
class SliderController extends Controller
{
    public function viewSliders()
    {
        $banners = Slider::latest()->paginate(10);
        //$page = json_decode(json_encode($page));
        return view('admin.sliders.view_sliders', compact('banners'));
    }
    public function addSlider(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $slider = new Slider();
            $slider->title = $data['title'];
            $slider->caption = $data['caption'];
            $slugfix = Helper::slugfix($data['title']);
            $slider->slug = $slugfix;
            // Upload Image
            //uploads

            $image_path = $data['cover'];

            $extension = $image_path->getClientOriginalExtension();
            $New_path = rand(111111, 999999999) . '.' . $extension;
            $path_path = 'upload' .'/' .'sliders/' . 'large'. '/';
            $large_path =  $path_path .$New_path;
            if (!File::isDirectory($path_path)) {
                File::makeDirectory($path_path, $mode = 0777, true, true);
            }
            Image::make($image_path)->resize(860, 354)->save($large_path);
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            $slider->slider_path = $large_path;
            $slider->status = $status;
            $slider->save();
            return redirect('ad/sliders/view-sliders')->with('flash_message_success', ' جدید ایجاد شد اسلایدر');
        }
        return view('admin.sliders.add_slider');
    }

    public function editSlider(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //$slugfix = Helper::slugfix($data['title']);
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
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
                    $path_path = 'upload' .'/' .'sliders/' . 'large'. '/';
                    $large_path =  $path_path .$New_path;
                    if (!File::isDirectory($path_path)) {
                        File::makeDirectory($path_path, $mode = 0777, true, true);
                    }
                    Image::make($image_path)->resize(860, 354)->save($large_path);
                    //upoload
                }else{

                }
            }

            Slider::where(['id' => $id])->update([
                'slider_path' =>  $large_path,'status' => $status, 'title' => $data['title'], 'caption' => $data['caption']
            ]);

            return redirect('ad/sliders/view-sliders')->with('flash_message_success', 'اسلایدر ویرایش ایجاد شد');
        }
        $slider = Slider::where(['id' => $id])->first();

        return view('admin.sliders.edit_slider', compact('slider'));
    }
    public function deleteSlider(Request $request, $id = null)
    {
// Get Product Image
        $bannerImage = Slider::where('id', $id)->first();
        $newpath = $bannerImage->slider_path;
        if (file_exists($newpath)) {
            unlink($newpath);
        }
        Slider::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'اسلایدر حذف  شد');
    }
}
