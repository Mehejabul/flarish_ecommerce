<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{
    public function index()
    {
        $page = '';
        $pages = Page::get()->all();
        return view('backend.page.page',compact('pages','page'));
    }
    public function edit($id)
    {
        $page = Page::findorFail($id);
        $pages = Page::get()->all();
        return view('backend.page.page',compact('pages','page'));
    }

    public function updatePageStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Page::where('id',$data['product_type'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_type'=> $data['product_type']]);
        }
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $category = new Page();
        $category->title = $request->title;
        $category->content = $request->content;
        // $category->parent_id = $request->parent_id;
        // $category->catalogue_id = $request->catalogue_id;
        // $category->description = $request->sortdescription;
        // $category->homepage_view = $request->homepage_view;

        // if($request->hasFile('image')){
        //     $image_temp = $request->file('image');
        //     if($image_temp->isValid()){
        //         //Get Image Extension
        //         $extension = $image_temp->getClientOriginalExtension();
        //         //Generate New Image Name
        //         $imageName = time().'.'.$extension;
        //         $imagePath = 'images/page/';
        //         $image_temp->move(public_path($imagePath),$imageName);
        //         $category->image = $imageName;
        //     }
        // }

        $category->save();
        return redirect()->back()->with('success','Page Create Successfully!');

    }
    public function update(Request $request, string $id)
    {
        $category = Page::findorFail($id);
        $category->title = $request->title;
        $category->content = $request->content;
        // $category->parent_id = $request->parent_id;
        // $category->catalogue_id = $request->catalogue_id;
        // $category->description = $request->sortdescription;
        // $category->homepage_view = $request->homepage_view;

        // if($request->hasFile('image')){
        //     $exists = public_path('images/page/'.$category->image);
        //     if(File::exists($exists))
        //     {
        //         File::delete($exists);
        //     }
        //     $image_temp = $request->file('image');
        //     if($image_temp->isValid()){
        //         //Get Image Extension
        //         $extension = $image_temp->getClientOriginalExtension();
        //         //Generate New Image Name
        //         $imageName = time().'.'.$extension;
        //         $imagePath = 'images/page/';
        //         $image_temp->move(public_path($imagePath),$imageName);
        //         $category->image = $imageName;
        //     }
        // }

        $category->update();

        return redirect()->back()->with('success','Page Update Successfully!');
    }
    public function show(string $id)
    {
        $page = Page::findorFail($id);
        // dd($page);
        return view('frontend.page',compact('page'));
    }
}
