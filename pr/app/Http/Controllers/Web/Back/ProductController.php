<?php

namespace App\Http\Controllers\Web\Back;

use App\Brand;
use App\Category;
use App\Discount;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Product;
use App\User;
use App\Worked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;

class ProductController extends Controller
{
    public function listProducts()
    {
        $products = Product::latest()->paginate(5);
        $categories = Category::all();
        return view('admin.products.view_products', compact('products', 'categories'));

    }

    public function addProduct(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['category_id'])) {
                return redirect()->back()->with('flash_message_success', 'دسته بندی وارد شود');
            }
            if (empty($data['brand_id'])) {
                return redirect()->back()->with('flash_message_success', 'برند  وارد شود');
            }
            if (!empty($data['meta_title'])) {
                $meta_title = $data['meta_title'];
            } else {
                $meta_title = $data['title'];
            }
            if (!empty($data['warranty'])) {
                $warranty = $data['warranty'];
            } else {
                $warranty = "";
            }
            if (!empty($data['is_demo'])) {
                $is_demo = $data['is_demo'];
            } else {
                $is_demo = '0';
            }
            if (!empty($data['is_stock'])) {
                $is_stock = $data['is_stock'];
            } else {
                $is_stock = '0';
            }
            if (!empty($data['meta_keywords'])) {
                $meta_keywords = $data['meta_keywords'];
            } else {
                $meta_keywords = $data['description_short'];
            }
            if (!empty($data['meta_description'])) {
                $meta_description = $data['meta_description'];
            } else {
                $meta_description = $data['description'];
            }
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if (empty($data['feature_items'])) {
                $feature_items = '0';
            } else {
                $feature_items = '1';
            }
            if (empty($data['show_price'])) {
                $show_price = '0';
            } else {
                $show_price = '1';
            }
            //upload
            if (!@empty($data['cover'])) {
                $image_path = $data['cover'];
                $extension = $image_path->getClientOriginalExtension();
                $New_path = rand(111111, 999999999) . '.' . $extension;
                $path_one = 'upload/products' . '/' . 'standard' . '/';
                $standard_path = $path_one . $New_path;
                if (!File::isDirectory($path_one)) {
                    File::makeDirectory($path_one, $mode = 0777, true, true);
                }
                Image::make($image_path)->resize(800, 800)->save($standard_path);
            } else {
                $standard_path = "";
            }
            //upload
            $slugfix = Helper::slugfix($data['title']);
            $product = new Product();
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];
            $product->title = $data['title'];
            $product->description_short = $data['description_short'];
            //$product->description = $data['description'];
            $product->meta_title = $meta_title;
            $product->meta_keywords = $meta_keywords;
            $product->meta_description = $meta_description;
            $product->slug = $slugfix;
            $product->cover = $standard_path;
            $product->price = $data['price'];
            $product->weight = $data['weight'];
            $product->warranty = $warranty;
            $product->show_price = $show_price;
            $product->feature_items = $feature_items;
            $product->is_demo = $is_demo;
            $product->status = $status;
            $product->is_stock = $is_stock;
            $product->save();
            $saveId = Product::latest()->first()->id;
            return redirect('ad/products/view')->with('flash_message_success', 'محصول  با موفقیت ایجاد شد');

        }
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::all();
        return view('admin.products.add_product', compact('categories', 'brands'));
    }

    public function editProduct(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['category_id'])) {
                return redirect()->back()->with('flash_message_success', 'دسته بندی وارد شود');
            }
            if (!empty($data['is_stock'])) {
                $is_stock = $data['is_stock'];
            } else {
                $is_stock = '0';
            }
            if (empty($data['brand_id'])) {
                return redirect()->back()->with('flash_message_success', 'برند  وارد شود');
            }
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if (!empty($data['warranty'])) {
                $warranty = $data['warranty'];
            } else {
                $warranty = "";
            }
            if (!empty($data['is_demo'])) {
                $is_demo = $data['is_demo'];
            } else {
                $is_demo = '0';
            }
            if (empty($data['feature_items'])) {
                $feature_items = '0';
            } else {
                $feature_items = '1';
            }
            if (empty($data['show_price'])) {
                $show_price = '0';
            } else {
                $show_price = '1';
            }
            if (!empty($data['meta_title'])) {
                $meta_title = $data['meta_title'];
            } else {
                $meta_title = $data['title'];
            }
            if (!empty($data['meta_keywords'])) {
                $meta_keywords = $data['meta_keywords'];
            } else {
                $meta_keywords = $data['description_short'];
            }
            if (!empty($data['meta_description'])) {
                $meta_description = $data['meta_description'];
            } else {
                $meta_description = $data['description'];
            }
            //upload image
            if (empty($data['cover'])) {
                $New_path = $data['cover_img'];
                $pathImage = Product::where('id', $id)->first();
                $standard_path = $pathImage->cover;

            } else {
                //$cover_path = $data['cover_img'];
                //echo '<pre>'; print_r($cover_path);die;
                $productImage = Product::where('id', $id)->first();

                $cover = $productImage->cover;
                // Delete Large Image if not exists in Folder
                if (file_exists($cover)) {
                    unlink($cover);
                }
                // Delete Large Image if not exists in Folder
                if ($request->hasFile('cover')) {
                    //uploads

                    $image_path = $data['cover'];
                    $extension = $image_path->getClientOriginalExtension();
                    $New_path = rand(111111, 999999999) . '.' . $extension;
                    $path_one = 'upload/products' . '/' . 'standard' . '/';

                    $standard_path = $path_one . $New_path;

                    if (!File::isDirectory($path_one)) {
                        File::makeDirectory($path_one, $mode = 0777, true, true);
                    }

                    Image::make($image_path)->resize(800, 800)->save($standard_path);

                    //upoload
                }
            }
            Product::where(['id' => $id])->update([
                'status' => $status, 'feature_items' => $feature_items, 'show_price' => $show_price,
                'weight' => $data['weight'], 'price' => $data['price'], 'is_demo' => $is_demo, 'warranty' => $warranty,
                'category_id' => $data['category_id'], 'title' => $data['title'], 'meta_title' => $meta_title,
                'description_short' => $data['description_short'],
                'cover' => $standard_path,
                'meta_keywords' => $meta_keywords, 'meta_description' => $meta_description, 'is_stock' => $is_stock
            ]);
            return redirect('ad/products/view')->with('flash_message_success', 'محصول  با موفقیت بروز شد');

        }
        $products = Product::where('id', $id)->first();
        //dd($products);
        // $categories = Category::with('children')
        //     ->where('parent_id', 0)
        //     ->get();
        //$category = Category::whereId($products->category_id)->first();
        // dd($category);
        //category
        $categories = Category::where(['parent_id' => 0])->get();

        $categories_drop_down = "<option value='' disabled>انتخاب</option>";
        foreach ($categories as $cat) {
            if ($cat->id == $products->category_id) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $categories_drop_down .= "<option value='" . $cat->id . "' " . $selected . ">" . $cat->title . "</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                if ($sub_cat->id == $products->category_id) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                $categories_drop_down .= "<option value='" . $sub_cat->id . "' " . $selected . ">&nbsp;&nbsp;--&nbsp;" . $sub_cat->title . "</option>";
                $sub_sub_categories = Category::where(['parent_id' => $sub_cat->id])->get();
                foreach ($sub_sub_categories as $sub_sub_cat) {
                    if ($sub_sub_cat->id == $products->category_id) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                    $categories_drop_down .= "<option value='" . $sub_sub_cat->id . "' " . $selected . ">&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;" . $sub_sub_cat->title . "</option>";
                    $sub_sub_sub_categories = Category::where(['parent_id' => $sub_sub_cat->id])->get();
                    //sub3
                    foreach ($sub_sub_sub_categories as $sub_sub_sub_cat) {
                        if ($sub_sub_sub_cat->id == $products->category_id) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                        $categories_drop_down .= "<option value='" . $sub_sub_sub_cat->id . "' " . $selected . ">&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;" . $sub_sub_sub_cat->title . "</option>";

                    }
                }
            }
        }
        //category
        $brands = Brand::all();
        return view('admin.products.edit_product', compact('categories_drop_down', 'products', 'brands'));
    }

    public function deleteProduct($id = null)
    {
        $productImage = Product::where('id', $id)->first();
        $cover = $productImage->cover;
        // Delete Large Image if not exists in Folder
        if (file_exists($cover)) {
            unlink($cover);
        }
        // Delete Large Image if not exists in Folder
        Discount::where(['product_id' => $id])->delete();
        Gallery::where(['product_id' => $id])->delete();
        Worked::where(['product_id' => $id])->delete();
        Product::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', ' محصول با موفقیت حذف شد');

    }

    public function addImages(Request $request, $id = null)
    {
        $productDetails = Product::where(['id' => $id])->first();

        $categoryDetails = Category::where(['id' => $productDetails->category_id])->first();
        $category_name = $categoryDetails->name;
        if ($request->isMethod('post')) {
            $data = $request->all();
            if ($request->hasFile('cover')) {
                $files = $request->file('cover');
                //$files = $data['cover'];
                foreach ($files as $file) {
                    // Upload Images after Resize
                    $image = new Gallery();
                    //upload
                    $user_id = Auth::user()->id;
                    $user = User::where('id', $user_id)->first();
                    $dirnameuser = $user->user_name;
                    //$image_path = $data['cover'];
                    $extension = $file->getClientOriginalExtension();
                    $New_path = rand(111111, 999999999) . '.' . $extension;
                    $path_one = 'upload/products/gallary/users' . '/' . $dirnameuser . '/' . 'standard' . '/';
                    $standard_path = $path_one . $New_path;
                    if (!File::isDirectory($path_one)) {
                        File::makeDirectory($path_one, $mode = 0777, true, true);
                    }

                    Image::make($file)->resize(800, 800)->save($standard_path);


                    $image->image = $New_path;
                    $image->path = $path_one;
                    $image->product_id = $data['product_id'];
                    $image->save();
                }
            }

            return redirect('ad/products/add-imgs/' . $id)->with('flash_message_success', 'تصاویر محصول با موفقیت اضافه شده است');
        }

        $productImages = Gallery::where(['product_id' => $id])->orderBy('id', 'DESC')->get();

        $title = "Add Images";
        return view('admin.gallary.add_images')->with(compact('title', 'productDetails', 'category_name', 'productImages'));
    }

    public function deleteProductAltImage($id = null)
    {
        $images = Gallery::where('id', $id)->first();
        $cover = $images->image;
//        echo "<pre>"; print_r($cover); die;

        // Get Product Image Paths
        if ($cover == null) {

        } else {
            $cover = $images->path . $images->image;

            // Delete Large Image if not exists in Folder
            if (file_exists($cover)) {
                unlink($cover);
            }


        }
        Gallery::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'عکس حذف شد  ');
    }

    public function addcountdown(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['special'])) {
                $special = '0';
            } else {
                $special = '1';
            }
            //echo "<pre>"; print_r($data); die;
            $expiry_date = Helper::DateNameShamsiToConvertDateNumber($data['expiry_date']);
            $countdown = new Discount();
            $countdown->product_id = $data['product_id'];
            $countdown->special_type = $data['special_type'];
            $countdown->discount = $data['discount'];
            $countdown->time_special = $expiry_date;
            $countdown->special = $special;
            $countdown->save();
            return redirect('ad/products/countdowns')->with('flash_message_success', 'کپن محصول جدید ایجاد شد');

        }
        $products = Product::where(['feature_items' => 1])->get();
        return view('admin.discounts.add_product', compact('products'));
    }

    public function listcountdown()
    {
        $count = Discount::with('product')->latest()->get();
        return view('admin.discounts.all_product', compact('count'));
    }

    public function editcountdown(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['special'])) {
                $special = '0';
            } else {
                $special = '1';
            }
            //echo "<pre>"; print_r($data); die;
            $expiry_date = Helper::DateNameShamsiToConvertDateNumber($data['expiry_date']);
            Discount::where(['id' => $id])->update([
                'product_id' => $data['product_id'], 'special_type' => $data['special_type'], 'discount' => $data['discount'],
                'special' => $special, 'time_special' => $expiry_date
            ]);
            return redirect('ad/products/countdowns')->with('flash_message_success', ' محصول جدید ویرایش شد');

        }
        $products = Product::where(['feature_items' => 1])->get();
        $coun = Discount::where('id', $id)->first();
        return view('admin.discounts.edit', compact('coun', 'products'));
    }

    public function deletecountdowns($id = null)
    {
        Discount::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', ' محصول با موفقیت شگفت انگیز حذف شد');
    }

    public function workeds()
    {
        $workerd = Worked::with('product')->latest()->get();
        return view('admin.workeds.all', compact('workerd'));
    }

    public function addworked(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['worked'])) {
                $worked = '0';
            } else {
                $worked = '1';
            }
            //echo "<pre>"; print_r($data); die;
            $expiry_date = Helper::DateNameShamsiToConvertDateNumber($data['expiry_date']);
            $countdown = new Worked();
            $countdown->product_id = $data['product_id'];
            $countdown->time_special = $expiry_date;
            $countdown->worked = $worked;
            $countdown->save();
            return redirect('ad/products/workeds')->with('flash_message_success', ' محصول جدید ایجاد شد');

        }
        $products = Product::where(['is_stock' => 1])->get();
        return view('admin.workeds.add', compact('products'));
    }

    public function editworked(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['worked'])) {
                $worked = '0';
            } else {
                $worked = '1';
            }
            //echo "<pre>"; print_r($data); die;
            $expiry_date = Helper::DateNameShamsiToConvertDateNumber($data['expiry_date']);
            Worked::where(['id' => $id])->update([
                'product_id' => $data['product_id'], 'time_special' => $expiry_date, 'worked' => $worked
            ]);
            return redirect('ad/products/workeds')->with('flash_message_success', ' محصول ویرایش  شد');

        }
        $products = Product::where(['is_stock' => 1])->get();
        $work = Worked::where('id', $id)->first();
        return view('admin.workeds.edit', compact('products', 'work'));
    }

    public function deleteworked($id = null)
    {
        Worked::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', ' محصول با موفقیت   حذف شد');
    }

}
