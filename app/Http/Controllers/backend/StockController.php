<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\ProductVariationDetails;
class StockController extends Controller
{
    //
    public function index()
    {
        $stocks = Stock::with('product')->get()->all();
        return view('backend.stock.index',compact('stocks'));
    }
    public function show(string $id)
    {
        $stock = Stock::findorfail($id);
        $variants = ProductVariationDetails::with('product','productvariation')->where('product_id',$stock->product_id)->get()->all();
        return view('backend.stock.stockvariation')->with(compact('variants'));
    }
    public function updateStockVariation(Request $request, string $id)
    {
        $variation = ProductVariationDetails::with('product','productvariation')->findorFail($id);
        if ($request->isMethod('post')) {
            // $variation->quantity = $request->updatequantity;
            // $variation->updare();
            // return redirect()->back()->with('success','Stock Size Update Successfully');
            $sum = 0;
            //$variation = ProductVariationDetails::with('product','productvariation')->findorFail($id);
        if ($variation->product->productvariation) {
            foreach ($variation->product->productvariation as $value) {
                if($value->id != $variation->id)
                {
                    $sum += $value->quantity;
                }
            }
        }
                //dd($sum);
        if(($sum+$request->updatequantity) <= $variation->product->stock->quantity)
        {
                $variation->quantity = $request->updatequantity;
                $variation->update();

                $stock = Stock::findorfail($variation->product->stock->id);
                $stock->available_qty = $sum+$request->updatequantity;
                $stock->update();
                return redirect()->back()->with('success','Stock Update Successfully!!');
        }
        return redirect()->back()->with('error','Stock Capacity Overflow!!');
            }
        return view('backend.stock.stock_variation_update',compact('variation'));
    }
    public function updateStockSize(Request $request, string $id)
    {
        $stock = Stock::findorFail($id);
        if ($request->isMethod('post')) {
            if($stock->quantity < $request->updatequantity)
            {
                $stock->quantity = $request->updatequantity;
                $stock->update();
                return redirect()->back()->with('success','Stock Size Updated');
            }
            else {
                return redirect()->back()->with('error','New Quantity Must Bigger Then Previous Stock');
            }
        }
        return view('backend.stock.stock_size_update',compact('stock'));
    }
}
