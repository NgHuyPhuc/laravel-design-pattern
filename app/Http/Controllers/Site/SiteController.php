<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        $featured = Product::OrderBy('id','DESC')->where('featured',1)->limit(4)->get()->toarray();
        $lastproducts = Product::OrderBy('id','DESC')->limit(8)->get()->toarray();
        
        // dd($featured);
        return view('frontend/index',[
            'featured'=>$featured,
            'lastproducts'=>$lastproducts,
        ]);
    }
    public function about()
    {
        return view('frontend/about/about');

    }
    public function contact()
    {
        return view('frontend/contact/contact');

    }
}
