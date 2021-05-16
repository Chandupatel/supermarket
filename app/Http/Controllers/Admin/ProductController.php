<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(50);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Session::has('temp_id') && empty(Session::get('temp_id'))) {
            Session::put('temp_id', rand());
        }
        $categories = Categories::where('parent_id', 0)->orderBy('name', 'asc')->get();
        $images = $this->get_temp_images();
        return view('admin.products.add', compact('categories', 'images'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => ['required'],
            'name' => ['required'],
            'youtube_video' => ['required'],
            'mrp_price' => ['required'],
            'purchase_price' => ['required'],
            'selling_price' => ['required'],
            'description' => ['required'],
            'terms_policy' => ['required'],
        ]);
        $product = new Product;
        $product->category_id = $request->category_id;
        if ($request->brand_id == 0) {
            $brand = new Brand;
            $brand->name = $request->brand_name;
            $brand->save();
            $product->brand_id = $brand->id;
        } else {
            $product->brand_id = $request->brand_id;
        }
        $product->name = $request->name;
        $product->youtube_video = $request->youtube_video;
        $product->mrp_price = $request->mrp_price;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->description = $request->description;
        $product->terms_policy = $request->terms_policy;
        $product->tags = $request->tags;

        $product->active_status = $request->active_status ? 1 : 0;
        $product->admin_approve_status = $request->admin_approve_status ? 1 : 0;
        $product->featured = $request->featured ? 1 : 0;
        $product->allow_cod = $request->allow_cod ? 1 : 0;
        if ($product->save()) {
            $product->sku = str_pad($product->id, 10, '0', STR_PAD_LEFT);
            $product->barcode = str_pad($product->id, 10, '0', STR_PAD_LEFT);
            if ($request->categories && is_array($request->categories) && count($request->categories) > 0) {
                foreach ($request->categories as $key => $value) {
                    $category = new ProductCategory;
                    $category->product_id = $product->id;
                    $category->category_id = $value;
                    $category->save();
                }
            }
            $file_path = 'products' . DIRECTORY_SEPARATOR . $product->id . DIRECTORY_SEPARATOR;
            if ($request->hasfile('thumbnail')) {
                $product->thumbnail = $this->uploadFile($request->file('thumbnail'), $file_path . DIRECTORY_SEPARATOR . 'thumbnail' . DIRECTORY_SEPARATOR);
            }
            if ($request->image_name && is_array($request->image_name) && count($request->image_name) > 0) {
                $temp_path = 'uploads' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . Session::get('temp_id') . DIRECTORY_SEPARATOR;
                $server_path = 'uploads' . DIRECTORY_SEPARATOR . $file_path . 'gallery';
                if (!is_dir(public_path($server_path))) {
                    mkdir(public_path($server_path));
                }
                $image_title = $request->image_title;
                foreach ($request->image_name as $key => $value) {
                    if ($value && file_exists(public_path($temp_path . $value))) {
                        $image = new ProductImage;
                        $image->product_id = $product->id;
                        $image->title = $image_title[$key];
                        $image->name = $value;
                        $image->save();
                        $server_path = $server_path . DIRECTORY_SEPARATOR;
                        $this->moveFilesFromServer($temp_path, $server_path, $value);
                    }
                }
            }
            $product->save();
            if (explode(",", $request->tags) && is_array(explode(",", $request->tags)) && count(explode(",", $request->tags)) > 0) {
                foreach (explode(",", $request->tags) as $tag_key => $tag) {
                    $product_teg = new ProductTag;
                    $product_teg->product_id = $product->id;
                    $product_teg->tag = $tag;
                    $product_teg->save();
                }
            }
            File::deleteDirectory(public_path('uploads' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . Session::get('temp_id')));
            Session::forget('temp_id');
            return redirect()->route('admin.products.index')->with('success', 'Product Added successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong !');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::where('parent_id', 0)->orderBy('name', 'asc')->get();
        $product = Product::with(['product_categories', 'brand', 'gallery'])->find($id);
        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => ['required'],
            'name' => ['required'],
            'youtube_video' => ['required'],
            'mrp_price' => ['required'],
            'purchase_price' => ['required'],
            'selling_price' => ['required'],
            'description' => ['required'],
            'terms_policy' => ['required'],
        ]);
        $product = Product::find($id);
        $product->category_id = $request->category_id;
        if ($request->brand_id == 0) {
            $brand = new Brand;
            $brand->name = $request->brand_name;
            $brand->save();
            $product->brand_id = $brand->id;
        } else {
            $product->brand_id = $request->brand_id;
        }
        $product->name = $request->name;
        $product->youtube_video = $request->youtube_video;
        $product->mrp_price = $request->mrp_price;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->description = $request->description;
        $product->terms_policy = $request->terms_policy;
        $product->tags = $request->tags;

        $product->active_status = $request->active_status ? 1 : 0;
        $product->admin_approve_status = $request->admin_approve_status ? 1 : 0;
        $product->featured = $request->featured ? 1 : 0;
        $product->allow_cod = $request->allow_cod ? 1 : 0;
        if ($product->save()) {
            $product->sku = str_pad($product->id, 10, '0', STR_PAD_LEFT);
            $product->barcode = str_pad($product->id, 10, '0', STR_PAD_LEFT);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function productsGalleryImageSave(Request $request)
    {
        $file_path = 'temp' . DIRECTORY_SEPARATOR . $request->folder_id . DIRECTORY_SEPARATOR;
        if ($request->new_product == 0) {
            $file_path = 'products' . DIRECTORY_SEPARATOR . $request->folder_id . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR;
        }
        $result['file_name'] = $this->uploadFile($request->file, $file_path);
        if ($request->new_product == 0) {
            $image = new ProductImage;
            $image->product_id = $request->folder_id;
            $image->title = $result['file_name'];
            $image->name = $result['file_name'];
            $image->save();
        }
        $result['status'] = true;
        return response($result);
    }

    public function productsGalleryImageDelete(Request $request)
    {
        $file_path = 'temp' . DIRECTORY_SEPARATOR . $request->folder_id . DIRECTORY_SEPARATOR;
        if ($request->new_product == 0) {
            $file_path = 'products' . DIRECTORY_SEPARATOR . $request->folder_id . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR;
            ProductImage::where('product_id', $request->folder_id)->where('name', basename($request->image_url))->delete();
        }
        $this->RemoveFile($request->image_url, $file_path);
        $result['status'] = true;
        return response($result);
    }

    public function get_temp_images()
    {
        $images = [];
        if (Session::has('temp_id') && !empty(Session::get('temp_id'))) {
            $tempdir = public_path('uploads' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . Session::get('temp_id'));
            if (is_dir($tempdir)) {
                $files = array_diff(scandir($tempdir), array('.', '..'));
                foreach (array_values($files) as $key => $file) {
                    $images[] = ['file_name' => $file, 'file_url' => asset('uploads/temp/' . Session::get('temp_id') . '/' . $file)];
                }
            }
        }
        return $images;
    }
}
