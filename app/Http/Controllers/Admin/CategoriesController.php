<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::where('parent_id', 0)->orderBy('name', 'asc')->get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $parent_id  =$request->parent_id;
        return view('admin.categories.add',compact('parent_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Categories;

        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->hasFile('image')) {
            $category->image  = $this->uploadIcon($request->file('image'));
        }
        if ($request->category_id) {
            $category->parent_id = $request->category_id;
        }
        if ( $category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Category Added successfully');
        }else{
            return redirect()->route('admin.categories.index')->with('error', 'Something Went Wrong !');
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
        $category = Categories::find($id);
        return view('admin.categories.edit',compact('category'));
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
        $category =  Categories::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->hasFile('image')) {
            $this->RemoveImage($category->image);
            $category->image  = $this->uploadIcon($request->file('image'));
        }
        if ( $category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Categor Update successfully');
        }else{
            return redirect()->route('admin.categories.index')->with('error', 'Something Went Wrong !');
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

    public function uploadIcon($icon) {
        $drive = public_path(DIRECTORY_SEPARATOR . 'categories_image' . DIRECTORY_SEPARATOR);
        $extension = $icon->getClientOriginalExtension();
        $filename = uniqid() . '.' . $extension;
        $newImage = $drive . $filename;
        $imgResource = $icon->move($drive, $filename);
        return $filename;
    }

    public function RemoveImage($image_url) { 
        $image = basename($image_url);
        $ImagePath = public_path(DIRECTORY_SEPARATOR . 'categories_image'.$image);
        if (\File::exists($ImagePath)) {
            \File::delete($ImagePath);
        }
    }
    public function get_sub_category(Request $request){
        $category = Categories::where('id', $request->filter)->first();
        
        if ($category) {     
            
            $html = '';
            $html .= '<div class="category-panel">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="font-weight-bold mb-3">'.$category->name.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                <a class="addcategory-btn" href="#" data-parentcategoryid="'.$category->id.'" class="card-link">
                                <i class="far fa-plus-square font-size-18"></i>
                                &nbsp;&nbsp;
                                <a href="#" class="editcategory"  data-value = "'.$category->id.'" edit-url= "'.route('admin.categories.edit',$category->id).'">
                                <i class="far fa-edit" style="cursor: pointer;"></i>
                                </a>'.'</h5>
                                
                                </a>
                            </div>
                            <ul class="list-group list-group-flush">';
            $sub_categories = Categories::where('parent_id',$request->filter)->get();
            if($sub_categories && count($sub_categories) > 0) {
                foreach($sub_categories as $value):
                    $html .= '<li data-categoryid="'.$value->id.'" class="list-group-item">'.$value->name.'</li>';
                endforeach;
            }
                
            $html .= '</ul><div class="card-body"><a class="addcategory-btn" href="#" data-parentcategoryid="'.$category->id.'" class="card-link">Add New</a></div></div></div>';

            $result['status'] = true;
            $result['data'] = $html;
            return response($result, 200);
        } else{
            $result['status'] = false;
            $result['data'] = '';
            return response($result, 200);
        }
    }

    public function productsSubCategories(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent_id' => ['required'],
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all(); 
           
            $result = ['message' =>array_shift($errors), 'status' => false];
            return response($result, 200);
        }
        $categories = Categories::where('parent_id', $request->parent_id)->orderBy('name', 'asc')->get();
        if ($categories && count($categories) > 0) {
            $result = ['categories' =>$categories, 'status' => true];
        }else{
            $result = ['categories' =>[], 'status' => true];
        }
        return response($result, 200);
        
    }
}
