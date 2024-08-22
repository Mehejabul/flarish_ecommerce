<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Stock;
use App\Models\ViewSection;
use App\Models\MultiImages;
use App\Models\ProductVariationDetails;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('catalogue','category','brand','unit','viewSection')->get()->all();
        return view('backend.product.index')->with(compact('products'));
    }
    public function updateProductStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Product::where('id',$data['product_type'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_type'=> $data['product_type']]);
        }
    }
    public function productVariation(Request $request)
    {
        if($request->isMethod('post'))
        {
            $rules = [
                'product' => 'required',
                'qty' => 'required',
                'size_id' =>'required',
            ];
            $this->validate($request,$rules);
            //dd($request->all());

            $total_qty = 0;
            $product = Product::with('stock')->where('slug',$request->product)->get()->first();
            $product_stock = Stock::findorFail($product->stock->id);
            foreach($request->qty as $key => $qnty)
            {
                $total_qty += $qnty;
            }
            if($product->stock->quantity >= $total_qty)
            {
                DB::beginTransaction();
                try {
                    foreach ($request->size_id as $key => $size) {
                        $details = new ProductVariationDetails();
                        $details->product_id = $product->id;
                        $details->product_variations_id = $size;
                        $details->quantity = $request->qty[$key];
                        $details->save();
                    }
                    $product_stock->available_qty = $total_qty;
                    $product_stock->update();
                    DB::commit();
                    return redirect()->back()->with('success','Product Variation Create Successfully');

                    } catch (\Exception $exception) {
                    //echo '<pre>';
                    //return $exception->getMessage();
                    //return back()->with('warning', 'Something error, please contact support.');

                    DB::rollBack();
                    return redirect()->back()->with('error','Product Variation Create Failed!');
                    }
            }
            else{
                return redirect()->back()->with('error','Product Variant Quantity Should be Less than or Equal Stock');
            }
        }
        return view('backend.product.product_variation_add');
    }
    public function create()
    {
        //$categories = Category::where('status','Active')->get()->toArray();
        $categories = Catalogue::with('category')->get()->toArray();
        //dd($categories);
        $brands = Brand::where('status','Active')->get()->all();
        $units = Unit::get()->all();
        // $product_types = ProductType::get()->all();
        $product_views = ViewSection::where('status','Active')->get()->all();
        return view('backend.product.create')->with(compact('categories','brands','units','product_views'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'title' => 'required',
            'slug' => 'required',
            'category_id' =>'required',
            'brand_id' =>'required',
            'unit_id' =>'required',
            'code' =>'required',
            //'color' =>'required',
            'alert_stock' =>'required',
            // 'view_section' =>'required',
            'stock' =>'required',
            // 'cost' =>'required',
            'mrp' =>'required',
        ];
        $this->validate($request,$rules);
        DB::beginTransaction();
        try {
            $categoryDetails = Category::find($request->category_id);
            $product = new Product();

            $product->catalogue_id = $categoryDetails['catalogue_id'];

            $product->category_id = $request->category_id;
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->brand_id = $request->brand_id;
            $product->unit_id = $request->unit_id;
            $product->code = $request->code;
            $product->color = $request->color;
            // $product->weight = $request->weight;
            // $product->has_stock = $request->has_stock;
            // $product->discount_type = $request->discount_type;
            if($request->discount_amount)
            {
                $product->discount_amount = $request->discount_amount;
            }

            $product->cost = $request->cost;
            $product->mrp = $request->mrp;
            $product->alert_stock = $request->alert_stock;
            // $product->tags = $request->tags;
            // $product->type = $request->type;
            $product->view_section = $request->view_section;
            // $product->description = $request->description;
            $product->description = $request->details;
            $product->details_description = $request->moreInfo;

            if($request->hasFile('image')){
                $image_temp = $request->file('image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension = $image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = time().'.'.$extension;
    //                $imagePath = 'images/product_image/'.$imageName;
    //                Image::make($image_temp)->resize(1040,1300)->save($imagePath);
                    $imagePath = 'images/product_image';
                    $image_temp->move(public_path($imagePath),$imageName);
                    $product->image = $imageName;
                }
            }
    //         if($request->hasFile('size_guide')){
    //             $image_temp = $request->file('size_guide');
    //             if($image_temp->isValid()){
    //                 //Get Image Extension
    //                 $extension = $image_temp->getClientOriginalExtension();
    //                 //Generate New Image Name
    //                 $imageName = time().'.'.$extension;
    //                $imagePath = 'images/product_sizeguide/'.$imageName;
    //                Image::make($image_temp)->resize(2389,3117)->save($imagePath);
    //                 $imagePath = 'images/product_sizeguide';
    //                 $image_temp->move(public_path($imagePath),$imageName);
    //                 $product->size_guide = $imageName;
    //             }
    //         }


            $product->save();
            $last = $product->id;

            if($request->hasFile("multiImage"))
            {
                $files = $request->file("multiImage");
                foreach ($files as $key => $file) {
                    $imageName = time().$key.'.'.$file->getClientOriginalExtension();
                    $productImg['product_id'] = $product->id;
                    $productImg['image'] = $imageName;
                    $imagePath = 'images/multiImage';
                    $file->move(public_path($imagePath),$imageName);
                    MultiImages::create($productImg);
                }
            }


            if($last)
            {
                $product_stock = new Stock();
                if($request->stock)
                {
                    $product_stock->quantity = $request->stock;
                    $product_stock->available_qty = $request->stock;
                }
                $product_stock->product_id = $last;
                $product_stock->alert_stock = $request->alert_stock;
                $product_stock->save();
            }
            DB::commit();
            return redirect()->back()->with('success','Product Create Successfully!');

            } catch (\Exception $exception) {
            //echo '<pre>';
            //return $exception->getMessage();
            //return back()->with('warning', 'Something error, please contact support.');
                DB::rollBack();
                return redirect()->back()->with('error','Product Create Failed!');
            }
    }

    public function show(string $id)
    {
        $product = Product::findorFail($id);
        // dd($product->images);
        // $product = Product::where('slug',$id)->get()->all();
        return view('frontend.product_details',compact('product'));
    }
    public function productDetailsID(string $id)
    {
        $product = Product::findorFail($id);
        //  dd($product);
        // $product = Product::where('slug',$id)->get()->all();
        return view('frontend.product_details',compact('product'));
    }
    public function productDetails(string $slug)
    {
        $product = Product::where('slug',$slug)->get()->first();
        // dd($product->images);
        // $product = Product::where('slug',$id)->get()->all();
        return view('frontend.product_details',compact('product'));
    }
    public function edit(string $id)
    {
        $product = Product::findorFail($id);
        $categories = Catalogue::with('category')->get()->toArray();
        $brands = Brand::where('status','Active')->get()->all();
        $units = Unit::get()->all();
        // $product_types = ProductType::get()->all();
        $product_views = ViewSection::get()->all();
        return view('backend.product.edit')->with(compact('categories','brands','units','product','product_views'));
    }
    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => 'required',
            'category_id' =>'required',
            'brand_id' =>'required',
            'unit_id' =>'required',
            'code' =>'required',
            //'color' =>'required',
            // 'type' =>'required',
            'view_section' =>'required',
            // 'has_stock' =>'required',
            'cost' =>'required',
            'mrp' =>'required',
        ];
        $this->validate($request,$rules);
        $categoryDetails = Category::find($request->category_id);
        $product = Product::findorFail($id);
        $product->catalogue_id = $categoryDetails['catalogue_id'];
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->brand_id = $request->brand_id;
        $product->unit_id = $request->unit_id;
        $product->code = $request->code;
        $product->color = $request->color;
        // $product->weight = $request->weight;
        // $product->has_stock = $request->has_stock;
        // $product->discount_type = $request->discount_type;
        if($request->discount_amount)
        {
            $product->discount_amount = $request->discount_amount;
        }

        $product->cost = $request->cost;
        $product->mrp = $request->mrp;
        $product->alert_stock = $request->alert_stock;
        // $product->tags = $request->tags;
        // $product->type = $request->type;
        $product->view_section = $request->view_section;
        $product->description = $request->details;
        $product->details_description = $request->moreInfo;

        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
//                $imagePath = 'images/product_image/'.$imageName;
//                Image::make($image_temp)->resize(1040,1300)->save($imagePath);
                $imagePath = 'images/product_image';
                $image_temp->move(public_path($imagePath),$imageName);
                $product->image = $imageName;
            }
        }
//         if($request->hasFile('size_guide')){
//             $image_temp = $request->file('size_guide');
//             if($image_temp->isValid()){
//                 //Get Image Extension
//                 $extension = $image_temp->getClientOriginalExtension();
//                 //Generate New Image Name
//                 $imageName = time().'.'.$extension;
// //                $imagePath = 'images/product_sizeguide/'.$imageName;
// //                Image::make($image_temp)->resize(2389,3117)->save($imagePath);
//                 $imagePath = 'images/product_sizeguide';
//                 $image_temp->move(public_path($imagePath),$imageName);
//                 $product->size_guide = $imageName;
//             }
        // }
        $product->update();

        if($request->hasFile("multiImage"))
        {
            $files = $request->file("multiImage");
            foreach ($files as $file) {
                $imageName = time().'_'.$file->getClientOriginalName();
                $productImg['product_id'] = $product->id;
                $productImg['image'] = $imageName;
                $imagePath = 'images/multiImage';
                $file->move(public_path($imagePath),$imageName);
                MultiImages::create($productImg);
            }
        }
        return redirect()->back()->with('success','Product Update Successfully!');
    }
}
