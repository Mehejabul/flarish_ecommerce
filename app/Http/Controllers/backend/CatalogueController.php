<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogue;
class CatalogueController extends Controller
{
    //
    public function index()
    {
        $catalogue = '';
        $catalogues = Catalogue::get()->all();
        //dd($catalogues);
        return view('backend.catalogue.catalogue',compact('catalogue','catalogues'));
    }
    public function edit($id)
    {
        $catalogue = Catalogue::findorFail($id);
        $catalogues = Catalogue::get()->all();
        //dd($catalogues);
        return view('backend.catalogue.catalogue',compact('catalogue','catalogues'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'name' => 'required',
            'slug' =>'required',
        ];
        $this->validate($request,$rules);
        $catalogue = new Catalogue();
        $catalogue->name = $request->name;
        $catalogue->slug = $request->slug;
        $catalogue->status = 'Active';
        // Catalogue::create($data);
        $catalogue->save();
        return Redirect()->back()->with('success','Catalogue Create Successfully');
    }
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $rules = [
            'name' => 'required',
            'slug' =>'required',
        ];
        $this->validate($request,$rules);
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['status'] = 'Active';
        Catalogue::where('id',$id)->update($data);
        return Redirect()->back()->with('success','Catalogue Update Successfully');
    }
    public function updateCatalogueStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Catalogue::where('id',$data['product_type'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_type'=> $data['product_type']]);
        }
    }
}
