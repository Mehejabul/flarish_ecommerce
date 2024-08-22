<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use App\Models\ProductVariationDetails;
class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        //dd($cartItems);
        //return view('client.cart')->with(compact('cartItems'));
        return view('client.cart',['cartItems'=>$cartItems]);
    }
}
