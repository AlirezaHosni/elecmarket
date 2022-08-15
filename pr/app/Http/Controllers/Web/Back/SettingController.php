<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\Icon;
use App\Setting;
use App\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class SettingController extends Controller
{
    public function all(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
//            echo '<pre>';
//            print_r($data);
//            die;
            $check = Setting::count();
            if ($check > 0) {
                $id = $data['setting_id'];
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
                Setting::where(['id' => $id])->update([
                    'footer_contact' => $data['footer_contact'], 'footer_about' => $data['footer_about'], 'copy_right' => $data['copy_right'],
                    'tel_header' => $data['tel_header'], 'logo_path' => $large_path,'bn_textbox' => $data['bn_textbox'],'address' => $data['address'],'reference' => $data['reference']
                ]);
                return redirect()->back();
            } else {
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
                $s = new Setting();
                $s->footer_contact = $data['footer_contact'];
                $s->reference = $data['reference'];
                $s->footer_about = $data['footer_about'];
                $s->copy_right = $data['copy_right'];
                $s->tel_header = $data['tel_header'];
                $s->address = $data['address'];
                $s->bn_textbox = $data['bn_textbox'];
                $s->logo_path = $large_path;
                $s->save();
                return redirect()->back();
            }
        }
        $settings = Setting::first();
        return view('admin.settings.settings', compact('settings'));
    }

    public function socials(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $check = Social::count();
            if ($check > 0) {
                $id = $data['socials_id'];
                Social::where(['id' => $id])->update([
                    'instagram' => $data['instagram'], 'telegram' => $data['telegram']
                ]);
                return redirect()->back();
            } else {
                $s = new Social();
                $s->instagram = $data['instagram'];
                $s->telegram = $data['telegram'];

                $s->save();
                return redirect()->back();
            }
        }
        $socials = Social::first();
        return view('admin.settings.socials', compact('socials'));
    }

    public function icons(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $check = Icon::count();
            if ($check > 0) {
                $id = $data['icons_id'];
                Icon::where(['id' => $id])->update([
                    'icon_1' => $data['icon_1'], 'icon_2' => $data['icon_2'],'icon_3' => $data['icon_3'],'icon_4' => $data['icon_4'],'icon_5' => $data['icon_5']
                ]);
                return redirect()->back();
            } else {
                $s = new Icon();
                $s->icon_1 = $data['icon_1'];
                $s->icon_2 = $data['icon_2'];
                $s->icon_3 = $data['icon_3'];
                $s->icon_4 = $data['icon_4'];
                $s->icon_5 = $data['icon_5'];
                $s->save();
                return redirect()->back();
            }
        }
        $icons = Icon::first();
        return view('admin.settings.icons', compact('icons'));
    }
}
