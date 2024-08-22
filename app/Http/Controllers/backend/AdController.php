<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\File;
class AdController extends Controller
{
    public function index()
    {
        $ad = '';
        $ads = Ad::get()->all();
        return view('backend.ad-zone.ad',compact('ads','ad'));
    }
    public function edit($id)
    {
        $ad = Ad::findorFail($id);
        $ads = Ad::get()->all();
        return view('backend.ad-zone.ad',compact('ads','ad'));
    }

    public function updateAdStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Ad::where('id',$data['product_type'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_type'=> $data['product_type']]);
        }
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $category = new Ad();
        $category->type = $request->type;
        // $category->parent_id = $request->parent_id;
        // $category->catalogue_id = $request->catalogue_id;
        // $category->description = $request->sortdescription;
        // $category->homepage_view = $request->homepage_view;

        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/Ad/';
                $image_temp->move(public_path($imagePath),$imageName);
                $category->image = $imageName;
            }
        }

        $category->save();
        return redirect()->back()->with('success','Ad Create Successfully!');

    }
    public function update(Request $request, string $id)
    {
        $category = Ad::findorFail($id);
        $category->type = $request->type;
        // $category->parent_id = $request->parent_id;
        // $category->catalogue_id = $request->catalogue_id;
        // $category->description = $request->sortdescription;
        // $category->homepage_view = $request->homepage_view;

        if($request->hasFile('image')){
            $exists = public_path('images/Ad/'.$category->image);
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
                $imagePath = 'images/Ad/';
                $image_temp->move(public_path($imagePath),$imageName);
                $category->image = $imageName;
            }
        }

        $category->update();

        return redirect()->back()->with('success','Ad Update Successfully!');
    }
}
