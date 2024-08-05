<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\AddCategoryRequest;
use App\Models\Category;
use App\Slug\Slug;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::all()->toArray();
        // dd($categories);
        return view("backend/categories/category",['categories'=>$categories]);
    }
    public function insert(AddCategoryRequest $addCategoryRequest){
        $category = new Category();
        $category->parent = $addCategoryRequest->parent;
        $category->name = $addCategoryRequest->name;
        $category->slug = Slug::getslug($addCategoryRequest->name);
        // dd($request);
        $category->save();
        return redirect('admin/category');
    }
    public function edit($id){
        $categories = Category::all()->toArray();
        $category = Category::find($id);

        return view("backend/categories/editcategory",[
            'category'=>$category,
            'categories'=>$categories,
        ]);
    }
    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent = $request->parent;
        $category->slug = Slug::getslug($request->name);
        $category->save();
        return redirect('admin/category');
    }
    
    public function deleteitem($id){
        
        $categories = Category::all()->toArray();
        $delcategory = Category::find($id);

        // foreach($categories as $item)
        // {
        //     if($item['parent']==$id)
        //     {
        //         $delitem = Category::find($item['id']);
        //         $newid = $delitem['id'];
        //         $delitem->delete();
        //         $this->deleteitem($newid);
        //     }
        // }

        Slug::delitem($categories,$id);

        $delcategory->delete();
        return redirect('admin/category');
        
        // function delall($id){
        //     $categories = Category::all()->toArray();
        //     $delcategory = Category::find($id);
        //     foreach($categories as $item)
        //     {
        //         if($item['parent']==$id){
        //             $delitem = Category::find($item['id']);
        //             $delitem->delete();
        //             // $item->delete();
        //             delall($id);
        //         }
        //     }
        //     $delcategory->delete();
            
        //     return redirect('admin/category');
        // }
    }
}
