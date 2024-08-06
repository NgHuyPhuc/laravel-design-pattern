<?php

namespace App\Services\Admin;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Repositories\Repository\ProductRepository;
use App\Slug\Slug;
use Illuminate\Support\Facades\Hash;

class ProductAdminService
{

    protected $productService;
    public function __construct(ProductRepository $ProductRepository)
    {
        $this->productService = $ProductRepository;
    }
    public function getall()
    {
        return $this->productService->all();
    }
    public function paginate($perPage = 5, $pageName = 'page', $page = null)
    {
        return $this->productService->paginate($perPage, ['*'], $pageName, $page);
    }
    public function create(ProductRequest $ProductRequest){
        if ($ProductRequest->hasFile("image")) {
            $file = $ProductRequest->image;

            $fileExtension = $file->getClientOriginalExtension();

            $file->move("uploads", Slug::getSlug($ProductRequest->name) . "." . $fileExtension);
        }
        $data = [
            'name' => $ProductRequest->name,
            'code' => $ProductRequest->code,
            'slug' => Slug::getSlug($ProductRequest->name),
            'info' => $ProductRequest->info,
            'describer' => $ProductRequest->describer,
            'image' => Slug::getSlug($ProductRequest->name) . "." . $fileExtension,
            'price' => $ProductRequest->price,
            'featured' => $ProductRequest->featured,
            'state' => $ProductRequest->state,
            'categories_id' => $ProductRequest->categories_id,
        ];
        // dd($data);
        return $this->productService->create($data);
    }
    public function edit($id)
    {
        return $this->productService->find($id);
        
    }
    public function update(EditProductRequest $editProductRequest, $id)
    {
        //image
        $image = $this->find($id)->image;
        // dd($image);
        if ($editProductRequest->hasFile("image")) {
            $file = $editProductRequest->image;
            $fileExtension = $file->getClientOriginalExtension();
            $file->move("uploads", Slug::getSlug($editProductRequest->name) . "." . $fileExtension);
            $image = Slug::getSlug($editProductRequest->name) . "." . $fileExtension;
        }
        $data = [
            'name' => $editProductRequest->name,
            'code' => $editProductRequest->code,
            'slug' => Slug::getSlug($editProductRequest->name),
            'info' => $editProductRequest->info,
            'describer' => $editProductRequest->describer,
            'price' => $editProductRequest->price,
            'image' => $image,
            'featured' => $editProductRequest->featured,
            'state' => $editProductRequest->state,
            'categories_id' => $editProductRequest->categories_id,
        ];
        return $this->productService->update($id, $data);
    }
    public function delete($id)
    {
        return $this->productService->delete($id);
    }
    public function find($id){
        return $this->productService->find($id);
    }
}
