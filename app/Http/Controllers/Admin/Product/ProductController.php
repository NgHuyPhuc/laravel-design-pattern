<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Slug\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        // $products = DB::table('products')
        // ->join("categories","products.categories_id","=","categories.id")
        // ->select(
        //     "products.id",
        //     "image",
        //     "code",
        //     "products.name as products_name",
        //     "price",
        //     "state",
        //     "categories.name as categories_name",
        // )->orderBy('products.id','DESC')->get()->all();
        // return view("backend/products/listproduct",["products"=>$products]);

        $products = Product::orderBy("id", "DESC")->paginate(5);
        return view("backend/products/listproduct", ["products" => $products]);
    }
    public function create()
    {
        // $str = "Nguyễn Huy Phúc";
        // echo Slug::getSlug($str);

        $categories = Category::all()->toArray();
        return view("backend/products/addproduct", ["categories" => $categories]);
    }
    public function store(ProductRequest $ProductRequest)
    {

        if ($ProductRequest->hasFile("image")) {
            $file = $ProductRequest->image;

            $fileExtension = $file->getClientOriginalExtension();

            $file->move("uploads", Slug::getSlug($ProductRequest->name) . "." . $fileExtension);
        }
        $product = new Product();
        $product->name = $ProductRequest->name;
        $product->code = $ProductRequest->code;
        $product->slug = Slug::getSlug($ProductRequest->name);
        $product->info = $ProductRequest->info;
        $product->describer = $ProductRequest->describer;
        $product->image = Slug::getSlug($ProductRequest->name) . "." . $fileExtension;
        $product->price = $ProductRequest->price;
        $product->featured = $ProductRequest->featured;
        $product->state = $ProductRequest->state;
        $product->categories_id = $ProductRequest->categories_id;
        $product->save();

        $ProductRequest->session()->flash("alert", "Đã thêm thành công");

        return redirect("/admin/product");
        // return view("backend/products/addproduct");
    }
    public function edit($id)
    {
        // $product_item = Product::where("id", $id)->get()->toArray();
        $product_item = Product::find($id)->toArray();
        // dd($product_item);
        $categories = Category::all();
        return view("backend/products/editproduct", [
            "product_item" => $product_item,
            "categories" => $categories,
        ]);
    }
    public function update(EditProductRequest $editProductRequest, $id)
    {
        $product = Product::find($id);
        $product->name = $editProductRequest->name;
        $product->code = $editProductRequest->code;
        $product->slug = Slug::getSlug($editProductRequest->name);
        $product->info = $editProductRequest->info;
        $product->describer = $editProductRequest->describer;
        //image
        if ($editProductRequest->hasFile("image")) {
            $file = $editProductRequest->image;
            $fileExtension = $file->getClientOriginalExtension();
            $file->move("uploads", Slug::getSlug($editProductRequest->name) . "." . $fileExtension);
            $product->image = Slug::getSlug($editProductRequest->name) . "." . $fileExtension;
        }
 
        $product->price = $editProductRequest->price;
        $product->featured = $editProductRequest->featured;
        $product->state = $editProductRequest->state;
        $product->categories_id = $editProductRequest->categories_id;
        $product->save();

        $editProductRequest->session()->flash("alert", "Đã sửa thành công");

        return redirect("/admin/product");
        // return view("backend/products/editproduct");
    }
    public function delete(Request $resquest, $id)
    {
        $delproduct = Product::find($id);
        $resquest->session()->flash('delname', $delproduct->name);
        $delproduct->delete();

        $resquest->session()->flash("alert", "Đã xóa thành công sản phẩm ");

        return redirect("/admin/product");
    }
}
