<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Ad;
use App\Models\Page;
use Auth;
class HomeController extends Controller
{
    public function index()
    {
        // dd(App\Models\Product::get()->all());
        $banners = Banner::where('status','Active')->get()->all();
        $ads = Ad::where('status','Active')->get()->all();
        $newArrivalProducts = Product::where('status','Active')->where('view_section',1)->orderBy('id','DESC')->get()->all();
        $categories = Category::where('status','Active')->get()->all();
        $productCategories = Category::with('product')->where('homepage_view','yes')->where('status','Active')->get()->all();
        // dd($productCategories);
        // dd(Product::where('category_id',164)->get()->take(8));

        return view('frontend.index',compact('banners','newArrivalProducts','categories','productCategories','ads'));
    }

    public function shopPage(string $slug=null)
    {
        $categories = array();
        $start = 0;
        $end = 10000;
        if($slug)
        {
            $category = Category::where('slug',$slug)->get()->first();
            $products = Product::where('category_id',$category->id)->where('status','Active')->orderBy('id','DESC')->paginate(20);
        }
        else
        {
            $products = Product::where('status','Active')->orderBy('id','DESC')->paginate(20);
        }

        return view('frontend.shoppage',compact('products','categories','start','end'));
    }
    public function shopPageid(string $slug=null)
    {
        $categories = array();
        $start = 0;
        $end = 10000;
        if($slug)
        {
            // $category = Category::where('slug',$slug)->get()->first();
            $products = Product::where('category_id',$slug)->where('status','Active')->orderBy('id','DESC')->paginate(20);
        }
        else
        {
            $products = Product::where('status','Active')->orderBy('id','DESC')->paginate(20);
        }

        return view('frontend.shoppage',compact('products','categories','start','end'));
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function checkout()
    {
        if (Auth::check()) {
            // $this->setAmountForCheckout();
            return view('frontend.checkout');
        } else {
            session()->put('cart_set', 'attach');
            return redirect()->route('login.website');
        }

    }
    // public function setAmountForCheckout()
    // {
    //     if (!Cart::instance('cart')->count() > 0) {
    //         session()->forget('checkout');
    //         return;
    //     } else {
    //         session()->put('checkout', [
    //             'discount' => 0,
    //             'subtotal' => Cart::instance('cart')->subtotal(),
    //             'total' => Cart::instance('cart')->total(),
    //         ]);
    //     }

    // }
    public function login_website()
    {
        return view('frontend.login');
    }

    public function register_website()
    {
        return view('frontend.register');
    }

    public function account()
    {
        if (Auth::user()) {
            $orderlist = Order::where('user_id', Auth::user()->id)->orderBy('id','DESC')->get()->all();
            return view('frontend.account')->with(compact('orderlist'));
        } else {
            return view('frontend.login');
        }
    }

    public function filterProduct(Request $request){
        //dd($request->all());
        $query = Product::query();
        $categories = array();

        if(isset($request->category) && ($request->category != null))
        {
            foreach($request->category as $category){
                array_push($categories,$category);
            }

            $query->whereHas('category',function($q) use ($request){
                $q->whereIn('id',$request->category);
            });
        }
        $start = ($request->start != null ? $request->start : 0);
        $end = $request->end;
        $query->where('status','Active');
        $query->whereBetween('mrp', [$start, $end]);
        $products = $query->paginate(20);

        return view('frontend.shoppage')->with(compact('products','categories','start','end'));
    }

    public function searchPage(Request $request)
    {
        $data['keyword'] = $request->keyword;
        $data['products'] = Product::where('title', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('details_description', 'LIKE', '%' . $request->keyword . '%')
            ->paginate(28);
        $data['start'] = 0;
        $data['end'] = 10000;
        $data['categories'] = array();
        return view('frontend.shoppage', $data);
    }
    public function pages(string $id)
    {
        $page = Page::findorFail($id);
        // dd($page);
        return view('frontend.page',compact('page'));
    }
}
