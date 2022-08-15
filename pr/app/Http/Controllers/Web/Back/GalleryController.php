<?php

namespace App\Http\Controllers\Web\Back;

use App\GallerySite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class GalleryController extends Controller
{
    public function allgallerys()
    {
        $gallery = GallerySite::latest()->paginate(5);
        return view('admin.gallerysite.view', compact('gallery'));
    }

    public function addgallerys(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo '<pre>'; print_r($data);die;
            $caption = $data['caption'];
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if (empty($data['image'])) {
                $image = "";
            } else {
                if ($request->hasFile('image')) {
                    //uploads

                    $image_path = $data['image'];

                    $extension = $image_path->getClientOriginalExtension();
                    $filename = rand(111111, 999999999) . '.' . $extension;
                    $path = 'upload' . '/' . 'gallery/';
                    $image = $path . $filename;
                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, $mode = 0777, true, true);
                    }
                    Image::make($image_path)->resize(92, 95)->save($image);
                    //upoload
                } else {

                }
            }
            $gallery = new GallerySite();
            $gallery->caption = $caption;
            $gallery->image = $image;
            $gallery->status = $status;
            $gallery->save();
            return redirect('/ad/gallerysites/view-gallerysites')->with('flash_message_success', 'gallerysites ایجاد شد');
        }
        return view('admin.gallerysite.add');
    }

    public function editgallerys(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo '<pre>'; print_r($data);die;
            $caption = $data['caption'];
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if (empty($data['image'])) {
                $image = $data['cover_img'];
            } else {
                if ($request->hasFile('image')) {
                    //uploads
                    $cover_path = $data['cover_img'];
                    //echo '<pre>'; print_r($cover_path);die;
                    if (file_exists($cover_path)) {
                        unlink($cover_path);
                    }
                    $image_path = $data['image'];

                    $extension = $image_path->getClientOriginalExtension();
                    $filename = rand(111111, 999999999) . '.' . $extension;
                    $path = 'upload' . '/' . 'gallery/';
                    $image = $path . $filename;
                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, $mode = 0777, true, true);
                    }
                    Image::make($image_path)->resize(92, 95)->save($image);
                    //upoload
                }

            }
            GallerySite::where(['id' => $id])->update([
                'status' => $status,'caption' => $caption,'image' => $image
            ]);
            return redirect('/ad/gallerysites/view-gallerysites')->with('flash_message_success', 'gallerysites ایجاد شد');
        }
        $gallery = GallerySite::where('id', $id)->first();
        return view('admin.gallerysite.edit', compact('gallery'));
    }

    public function deletegallerys($id = null)
    {
        $galley = GallerySite::where('id', $id)->first();
        $newpath = $galley->image;
        if (file_exists($newpath)) {
            unlink($newpath);
        }
        GallerySite::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', ' GallerySite با موفقیت حذف شد');
    }
}
