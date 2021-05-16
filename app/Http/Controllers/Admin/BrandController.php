<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request; 

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('name', 'ASC')->paginate(50);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.brands.add');
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
            'name' => ['required'],
        ]);
        $brand = new Brand;
        if ($request->hasfile('logo')) {
            $file_path = 'brand_logo_images' . DIRECTORY_SEPARATOR;
            $brand->logo = $this->uploadFile($request->file('logo'), $file_path);
        }
        $brand->name = $request->name;
        if ($brand->save()) {
            return redirect()->route('admin.brands.index')->with('success', 'Brand Added successfully');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.edit', compact('brand'));
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
            'name' => ['required'],
        ]);
        $brand = Brand::find($id);
        if ($request->hasfile('logo')) {
            $file_path = 'brand_logo_images' . DIRECTORY_SEPARATOR;
            $this->RemoveFile($brand->logo, $file_path);
            $brand->logo = $this->uploadFile($request->file('logo'), $file_path);
        }
        $brand->name = $request->name;
        if ($brand->save()) {
            return redirect()->route('admin.brands.index')->with('success', 'Brand Update successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong !');
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
        try {
            $brand = Brand::find($id);
            if ($brand) {
                $file_path = 'brand_logo_images' . DIRECTORY_SEPARATOR;
                $this->RemoveFile($brand->logo, $file_path);
                if ($brand->delete()) {
                    $result = ['message' => "Brand Deleted Successfully", 'data' => [], 'status' => true];
                    return response($result, 200);
                } else {
                    $result = ['message' => "Something Went Wrong", 'data' => [], 'status' => false];
                    return response($result, 200);
                }
            } else {
                $result = ['message' => "Attribute Data Not Found...", 'data' => [], 'status' => false];
                return response($result, 200);
            }
        } catch (Exception $e) {
            $result = ['message' => $e->getMessage(), 'status' => false];
            return response($result, 200);
        }
    }

    public function getAutocompleteBrands(Request $request)
    {
        $data = Brand::select("id","name")
        ->where("name","LIKE","%{$request->input('query')}%")
        ->get();
        return response()->json($data);
    }
}
