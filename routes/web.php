<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Site\Cart\CartController;
use App\Http\Controllers\Site\Category\CategoryController as CategoryCategoryController;
use App\Http\Controllers\Site\Product\ProductController as ProductProductController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get("/login",function(){
//     echo "<form method=post>";
//     echo "<input type=text name=txt/>";
//     echo "<input type=submit name=sbm value=login />";
//     csrf_field();
//     echo "</form>";
// });

// Route::post("/login",function(){
//     return "Login success!";
// });

// Route::get("/admin",function(){
//     return "admin";
// });
// Route::get("/admin/product",function(){
//     return "danh sach san pham";
// });
// Route::get("/admin/product/add",function(){
//     return "them san pham";
// });
// Route::get("/admin/producct/del",function(){
//     return "xoa san pham";
// });

// Route::group(["prefix"=>"admin"],function(){
//     Route::get("/",function(){
//         return "admin";
//     });
//     Route::group(["prefix"=>"product"],function(){
//         Route::get("/",function(){
//             return "danh sach san pham";
//         });
//         Route::get("/add",function(){
//             return "them moi san pham";
//         });
//         Route::get("/del",function(){
//             return "xoa san pham";
//         });
//     });
// });

// Route::get('/test1',[TestController::class,"test1"])->middleware('test');
// Route::get('/test2',[TestController::class,"test2"]);
// Route::group(["prefix"=>"/","middleware"=>"test" ],function(){
//     Route::get('/test1',[TestController::class,"test1"]);
//     Route::get('/test2',[TestController::class,"test2"]);
// });
    
// Route::get("/test",function(){
    // Schema::create("test",function($table){
    //     // $table->increments('id');
    // });
    // Schema::rename("test", "test1");
    // Schema::table('test1', function ($table) {
    //     $table->string("testfix");
    // });
    // Schema::table('test1', function ($table) {
    //     $table->dropColumn('testfix');
    // });
    // DB::table('categories')->insert(['name'=>'vay nam',"slug"=>"vay-nam",'parent'=>1]);
    // DB::table("categories")->insert([
    //     ['name'=>'Vay nam',"slug"=>"vay-nam-dep",'parent'=>2],
    //     ['name'=>'Vay nam',"slug"=>"vay-nam-xau",'parent'=>3]
    // ]);
    // DB::table('categories')->where('id',8)
    //                         ->delete();
    // $products = DB::table('products')->offset(5)->limit(10)->get()->all();
    // $categories = DB::table('categories')->get();
    // dd($categories);
    // $products = DB::table('products')->join('categories','products.categories_id','=','categories.id')
    //                                 ->select('categories.name as cat_name' , 'products.name as prd_name')
    //                                 ->get()->all();

    // dd($products);


    // dd($products[1]->name);
// });
Route::get('/test',[TestController::class,"test1"]);
Route::post('/test',[TestController::class,"test1"]);



//BACKEND
Route::group(["prefix"=>"/login","middleware"=>"checklogin"],function(){
    Route::get("/",[AuthController::class ,"getLogin"]);
    Route::post("/",[AuthController::class ,"postLogin"]);
});
Route::group(["prefix"=>"admin","middleware"=>"checkadmin"],function(){
    Route::get("/",[AdminController::class, "index"]);
    Route::get("/logout",[AdminController::class, "logout"]);
    Route::group(["prefix"=>"product"],function(){
        Route::get("/",[ProductController::class,"index"]);
        Route::get("/create",[ProductController::class,"create"]);
        Route::post("/store",[ProductController::class,"store"]);
        Route::get("/edit/{id}",[ProductController::class,"edit"]);
        Route::post("/update/{id}",[ProductController::class,"update"]);
        Route::post("/delete/{id}",[ProductController::class,"delete"]);
    });
    Route::group(["prefix"=>"category"],function(){
        Route::get("/",[CategoryController::class,"index"]);
        Route::get("/create",[CategoryController::class,"create"]);
        Route::post("/insert",[CategoryController::class,"insert"]);
        Route::get("/edit/{id}",[CategoryController::class,"edit"]);
        Route::post("/update/{id}",[CategoryController::class,"update"]);
        Route::get("/delete/{id}",[CategoryController::class,"deleteitem"]);
    });
    Route::group(["prefix"=>"user"],function(){
        Route::get("/",[UserController::class,"index"]);
        Route::get("/create",[UserController::class,"create"]);
        Route::post("/insert",[UserController::class,"insert"]);
        Route::get("/edit/{id}",[UserController::class,"edit"]);
        Route::post("/update/{id}",[UserController::class,"update"]);
        Route::get("/delete/{id}",[UserController::class,"delete"]);
    });
    Route::group(["prefix"=>"order"],function(){
        Route::get("/",[OrderController::class,"index"]);
        Route::get("/detail/{id}",[OrderController::class,"detail"]);
        Route::get("/processed",[OrderController::class,'processed']);
    });
});

//FRONTEND

Route::group(["prefix"=>"/"],function(){
    Route::get("/",[SiteController::class,"index"]);
    Route::get("/ve-chung-toi",[SiteController::class,"about"]);
    Route::get("/lien-he",[SiteController::class,"contact"]);
    Route::get("/danh-muc",[CategoryCategoryController::class,"index"]);
});
Route::group(["prefix"=>"/danh-muc"],function(){
    Route::get("/{slug}.html",[CategoryCategoryController::class,"index"]);
});
Route::group(["prefix"=>"/san-pham"],function(){
    Route::get("/",[ProductProductController::class,"shop"]);
    Route::get("/{slug}.html",[ProductProductController::class,"detail"]);
    Route::get("/tim-kiem",[ProductProductController::class,"filter"]);
});
Route::group(["prefix"=>"/gio-hang"],function(){
    Route::get("/",[CartController::class,"cart"]);
    Route::get("/them-hang/{id}",[CartController::class,"addToCart"]);
    Route::get("/cap-nhat-gio-hang/{id}/{qty}",[CartController::class,"update"]);
    Route::get("/xoa-hang/{id}",[CartController::class,"delete"]);
    Route::get("/thanh-toan.html",[CartController::class,"checkout"]);
    Route::post("/thanh-toan",[CartController::class,"payment"]);
    Route::get("/hoan-thanh/{id}",[CartController::class,"complete"]);
});

