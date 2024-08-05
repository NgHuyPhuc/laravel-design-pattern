<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function shop()
    {
        $data["allproduct"] = Product::orderby('id','desc')->paginate(6);
        $data["categories"] = Category::all()->toArray();
        // dd($data["categories"]);

        // dd($allproduct);
        return view('/frontend/product/shop',$data);
    }
    public function filter(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $data["allproduct"] = Product::orderby('id','desc')->wherebetween('price',[$start,$end])->paginate(6);
        $data["categories"] = Category::all()->toArray();
        // dd($data["categories"]);
        $data["allproduct"]->appends(['start'=>$start,'end'=>$end]);


        // dd($allproduct);
        return view('/frontend/product/shop',$data);
    }
    public function detail($slug)
    {
        $detailitem = Product::where('slug',$slug)->get()->toarray();
        $lastitem = Product::where('slug','<>',$slug)->limit(4)->get()->toarray();
        return view('/frontend/product/detail',[
            'detail'=>$detailitem[0],
            'lastitem'=>$lastitem,
        ]);
    }

}
