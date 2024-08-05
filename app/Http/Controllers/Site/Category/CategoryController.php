<?php

namespace App\Http\Controllers\Site\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index($slug)
    {
        $data["categories"] = Category::all()->toArray();
        $data["allproduct"] = Category::where('slug',$slug)
                                    ->first()
                                    ->product()
                                    ->orderby('id','desc')
                                    ->paginate(6);
        // dd($data["product"]);
        // dd($data["categories"]);

        // dd($allproduct);
        return view('/frontend/product/shop',$data);
    }
}
