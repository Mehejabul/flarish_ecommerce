<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Catalogue;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    public function index()
    {
        $category = '';
        $categories = Category::with('catalogue','subcategories')->where('parent_id','0')->get()->all();
        $catalogues = Catalogue::get()->all();
        $getCategories = array();
        return view('backend.category.category',compact('category','categories','catalogues','getCategories'));
    }
    public function edit($id)
    {
        $category = Category::findorFail($id);
        $categories = Category::with('subcategories')->where('parent_id','0')->get()->all();
        $catalogues = Catalogue::get()->all();
        $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'catalogue_id'=>$category['catalogue_id']])->get()->toArray();
        return view('backend.category.category',compact('category','categories','catalogues','getCategories'));
    }
    public function appendCategoryLevel(Request $request){
        //dd($request->all());
        if($request->ajax()){
            $data = $request->all();
            //dd($data);
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'catalogue_id'=>$data['catalogue_id']])->where('status','Active')->get()->toArray();
            //dd($getCategories);
            //return $getCategories;
            return view('backend.category.append_categories_level')->with(compact('getCategories'));
        }
    }
    public function updateCategoryStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Category::where('id',$data['product_type'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_type'=> $data['product_type']]);
        }
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->catalogue_id = $request->catalogue_id;
        $category->description = $request->sortdescription;
        $category->homepage_view = $request->homepage_view;

        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/category/';
                $image_temp->move(public_path($imagePath),$imageName);
                $category->image = $imageName;
            }
        }

        $category->save();
        return redirect()->back()->with('success','Category Create Successfully!');

    }
    public function update(Request $request, string $id)
    {
        $category = Category::findorFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->catalogue_id = $request->catalogue_id;
        $category->description = $request->sortdescription;
        $category->homepage_view = $request->homepage_view;

        if($request->hasFile('image')){
            $exists = 'images/category/'.$category->image;
            if(File::exists($exists))
            {
                File::delete($exists);
            }
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/category/';
                $image_temp->move(public_path($imagePath),$imageName);
                $category->image = $imageName;
            }
        }

        $category->update();

        return redirect()->back()->with('success','Category Update Successfully!');
    }
}
