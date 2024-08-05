<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderPorduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){
        $data['order'] = Order::orderby('id','desc')->where('state',0)->paginate(5);
        // $data['order'] = Order::orderby('id','desc')->where('state',0)->get()->toarray();
        // dd($data['order']);
        return view("/backend/orders/order",$data);
    }
    public function detail($id){
        $data['order'] = Order::where('id',$id)->get()->toarray();
        $data['detail'] = OrderPorduct::where('orders_id',$id)->get()->toarray();
        $data['ordermodal'] = Order::find($id);
        $data['pricetotal'] = 0;
        foreach($data['detail'] as $item){
            $data['pricetotal'] += $item['price']*$item['quantity'];
        }
        // dd($data);
        return view("/backend/orders/detailorder",$data);
    }
    public function processed(Request $request){
        if($request->input('id'))
        {
            // dd($request->input('id'));
            $order = Order::find($request->input('id'));
            $order->state = 1;
            $order->save();
        }
        $data['order'] = Order::orderby('id','desc')->where('state',1)->get();

        return view("/backend/orders/processed",$data);
    }
}
