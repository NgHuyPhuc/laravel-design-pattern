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
use \App\Services\Admin\ProductAdminService;

class ProductController extends Controller
{
    protected $products;
    public function __construct(ProductAdminService $productService)
    {
        $this->products = $productService;
    }
    public function index()
    {
        return view("backend/products/listproduct", ["products" => $this->products->paginate()]);
    }
    public function create()
    {
        $categories = Category::all()->toArray();
        return view("backend/products/addproduct", ["categories" => $categories]);
    }
    public function store(ProductRequest $ProductRequest)
    {
        $this->products->create($ProductRequest);
        $ProductRequest->session()->flash("alert", "Đã thêm thành công");
        return redirect("/admin/product");
    }
    public function edit($id)
    { 
        $product_item = $this->products->find($id);
        $categories = Category::all();
        return view("backend/products/editproduct", [
            "product_item" => $product_item,
            "categories" => $categories,
        ]);
    }
    public function update(EditProductRequest $editProductRequest, $id)
    {
        $this->products->update($editProductRequest, $id);
        $editProductRequest->session()->flash("alert", "Đã sửa thành công");
        return redirect("/admin/product");
    }
    public function delete(Request $resquest, $id)
    {
        $resquest->session()->flash('delname', $this->products->find($id)->name);
        $this->products->delete($id);
        $resquest->session()->flash("alert", "Đã xóa thành công sản phẩm ");
        return redirect("/admin/product");
    }
}
