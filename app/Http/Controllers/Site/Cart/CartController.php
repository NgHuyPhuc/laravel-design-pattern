<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderPorduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    //
    public function cart()
    {
        // dd(Cart::content());
        // dd(Cart::content()->options);
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        $data['pricetotal'] = Cart::priceTotal();
        return view('/frontend/cart/cart',$data);

    }
    public function addToCart(Request $request,$id)
    {
        $qty = $request->quantity ?$request->quantity:1 ;
        $product = Product::find($id);
        Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => $qty, 
            'price' => $product->price, 
            'weight' => 0, 
            'options' => [
                'code' => $product->code,
                'image' => $product->image,
            ]]);
            // Cart::destroy();
        return redirect("/gio-hang");
        // dd($id);
        // return "addToCart";
    }
    public function update($rowId , $qty)
    {
        Cart::update($rowId,$qty);
        return "updated";
    }
    public function delete($id)
    {
        Cart::remove($id);
        return redirect("/gio-hang");
    }
    public function checkout()
    {
        $data['cart'] = Cart::content();
        $data['pricetotal'] = Cart::priceTotal();
        return view('/frontend/cart/checkout',$data);
    }
    public function payment(Request $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->total = Cart::pricetotal();
        $order->state = 0;
        $order->save();
        // dd($request->input());
        foreach(Cart::content() as $item)
        {
            $orderproduct = new OrderPorduct();
            $orderproduct->name = $item->name;
            $orderproduct->code = $item->options->code;
            $orderproduct->price = $item->price;
            $orderproduct->quantity = $item->qty;
            $orderproduct->image = $item->options->image;
            $orderproduct->orders_id = $order->id;
            $orderproduct->save();
        }
        return redirect('/gio-hang/hoan-thanh/'.$order->id);
    }
    public function complete($id)
    {
        $data['order'] = Order::find($id);
        $data["purchaseTime"] = Carbon::now("Asia/Bangkok");
        $data['cart'] = Cart::content();
        $data['pricetotal'] = Cart::priceTotal();
        Cart::destroy();
        return view('/frontend/cart/complete',$data);
    }
}
