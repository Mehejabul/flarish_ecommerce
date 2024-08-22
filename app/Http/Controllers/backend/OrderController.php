<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function placeOrder(Request $req)
    {
DB::beginTransaction();
        try {
        //dd($req->all());
        $order = new Order();
        $order->user_id = Auth::user()->id;
//        $order->subtotal = session()->get('checkout')['subtotal'];
//        $order->discount = session()->get('checkout')['discount'];
//        // $order->tax = session()->get('checkout')['tax'];
//        $order->total = session()->get('checkout')['total'];
        $order->subtotal = $req->totalPrice;
//        $order->discount = $req->totalDiscount;
        $order->discount = 0;
        $order->shipping = $req->shippingCharge;
        $order->total = $req->totalPrice + $req->shippingCharge;

        $order->status= 'ordered';
        if(isset($req->is_shipping_different))
        {
            $order->is_shipping_different = true;
        }
        else{
            $order->is_shipping_different = false;
        }
        $order->save();
        // dd($req->cartData);
        foreach ($req->cartData as $item) {

            $orderItem = new OrderItem();

            $orderItem->product_id = $item['productId'];

            isset($item['productSizeId'])? $orderItem->product_variations_id = $item['productSizeId'] :  $orderItem->product_variations_id = 0;
            // if($item['productSize'])
            // {
            //     $orderItem->product_variations_id = $item['productSize'];
            // }
            // else{
            //     $orderItem->product_variations_id = 0;
            // }
            $orderItem->order_id = $order->id;
            $orderItem->price = $item['cusPrice'];
            $orderItem->quantity = $item['cusQty'];
//            dd($item['productSize'],$item['productSizeLabel'],$item['cusQty']);
            $orderItem->save();
        }
        if(isset($req->is_shipping_different))
        {
            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->mobile = $req->mobile;
            $shipping->line1 = $req->line1;
            $shipping->line2 = $req->line2;
            $shipping->city = $req->city;
            $shipping->save();
        }
        if($req->paymentMethod == 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }

//        Cart::instance('cart')->destroy();
//        session()->forget('checkout');
        DB::commit();
            return response()->json(['response' => true, 'orderId' => $order->id]);
    } catch (\Exception $exception) {
        DB::rollBack();
        //return $exception->getMessage();
        // return redirect(route('gift_product.create'))->with(['warning' => 'Something went wrong, when place a sale. try again.']);
        return response()->json(['response' => false]);
    }


    }
    public function customer()
    {
        $customers = User::where('type', 'Customer') ->orderBy('created_at', 'desc')->get();
        return view('backend.order.customer',compact('customers'));
    }
    public function updateCustomerStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            User::where('id',$data['product_type'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_type'=> $data['product_type']]);
        }
    }

    public function list(string $status=null)

    {
        //$orderlist = Order::with('user')->get()->all();
        //return view('server.order.index')->with(compact('orderlist'));
        //dd($status);
        if($status == 'ordered')
        {
            $title = 'New Order List';
            $orderlist = Order::with('user')->where('status','ordered')->get()->all();
            // return view('server.order.order')->with(compact('orderlist'));
        }
        elseif($status == 'confirm')
        {
            $title = 'Confirmed Order List';
            $orderlist = Order::with('user')->where('status','confirm')->get()->all();
            // return view('server.order.confirm')->with(compact('orderlist'));
        }
        elseif($status == 'shipping')
        {
            $title = 'Shipping Order List';
            $orderlist = Order::with('user')->where('status','shipping')->get()->all();
            // return view('server.order.shipping')->with(compact('orderlist'));
        }
        elseif($status == 'delivered')
        {
            $title = 'Delivered Order List';
            $orderlist = Order::with('user')->where('status','delivered')->get()->all();
            // return view('server.order.delivered')->with(compact('orderlist'));
        }
        elseif($status == 'canceled')
        {
            $title = 'Canceled Order List';
            $orderlist = Order::with('user')->where('status','canceled')->get()->all();
            // return view('server.order.cancel')->with(compact('orderlist'));
        }
        else
        {
            $title = 'All Order List';
            $orderlist = Order::with('user')->get()->all();
        }
        return view('backend.order.orderlist')->with(compact('orderlist','title'));

    }
    public function orderDetails(string $id)
    {
        $order = Order::with('user')->where('id',$id)->get()->first();
        $orderItems = OrderItem::with('product','variation')->where('order_id',$id)->get()->all();
        //dd($orderItems);
        return view('backend.order.order_details')->with(compact('orderItems','order'));
    }
    public function updateStatus(Request $request, string $id)
    {
        $order = Order::with('user')->findorFail($id);
        if($request->isMethod('post')){
            if($request->status == 'shipping')
            {
                $orderItem = OrderItem::where('order_id',$id)->get()->all();
                //dd($orderItem);
                foreach ($orderItem as $key => $item) {
                    $product_variant = ProductVariationDetails::where('id',$item->product_variations_id)->get()->first();
                    if($product_variant)
                    {
                        $product_variant->quantity -= $item->quantity;
                        $product_variant->update();
                    }
                    $stock = Stock::where('product_id',$item->product_id)->get()->first();
                    $stock->available_qty -= $item->quantity;
                    $stock->update();
                }
            }
            $order->status = $request->status;
            $order->update();
            return redirect()->back()->with('success','Order Status Update Successfully');
        }


        return view('backend.order.order_status',compact('order'));
    }
}
