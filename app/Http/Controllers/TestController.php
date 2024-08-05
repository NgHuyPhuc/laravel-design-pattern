<?php

namespace App\Http\Controllers;

use App\Demo\Demo;
use App\Models\Category;
use App\Models\Product;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test1(Request $request){
        // $st1=5;
        // $st2=10;
        // $kq=$st1+$st2;
        // $str="TextTest";
        // return view("test1",["a"=>$kq,"b"=>$str]);
        // return view("test1",["data"=>10]); 
        // return $request->query('page_layout');
        // return view("test1");
        // $request->session()->flash("password","12345");
        // return $request->session()->get("password");
        // $request->session()->put("email","vt@zz.zz");
        // $request->session()->forget("email");
        // return "test1";
        // return "Mid";
        // $test = new Test();
        // $test->name = "Test2";
        // $test->save();

        // $test = Test::find(1);
        // $test->name="New TEST";
        // $test->save();

        // $test = Test::find(1);
        // $test->delete();

        // $tests = Test::all()->toArray();
        // dd($tests);

        // $test = Test::orderBy("id","DESC")->where("id",">",0)->get()->toArray();
        // dd($test);
        // $tests= Test::paginate(1);
        // return view("test1",["tests"=>$tests]);
        // $users = User::all()->toArray();
        // dd($users);
        // $products = Category::find(2)->product->toArray();
        // dd($products);
        // $category = Product::find(3)->category->toArray();
        // dd($category);
        // $result = 0;
        // for($i=1;$i<=100;$i++)
        // {
        //     $result = $result+$i;
        // }

        // // echo $result;
        // function result($n){
        //     if($n == 100)
        //     {
        //         return $n;
        //     }
        //     return $n + result($n+1);
        // }
        
        // // 5*(4*(3*(2*1)))
        // // echo result(1);

        // $category = Category::all()->toArray();

        // function showdata($category, $parent, $char)
        // {
        //     foreach ($category as $item)
        //     {
        //         if($item["parent"] == $parent){
        //             echo $char.$item["name"]."<br/>";
        //             $newparent = $item["id"];
        //             echo showdata($category , $newparent, $char."|--");
        //         }
        //     }
        // }
        // showdata($category, 0,"");
        // dd($category);
        return view("test1");
        // dd("Facade");
        // echo Demo::helloWorld();
        

    }
    public function test2(Request $request){
        // $email = $request->email;
        // $password = $request->password;
        // return $email."<br>".$password;
        // return $request->all();
        // if($request->hasAny(["email","password"])){
        //     if($request->email =="smspro" && $request->password=="123")
        //     {
        //         return "login success";
        //     }
        //     else
        //     {
        //         return redirect()->back()->withInput();
        //     }
        // }
        // $messages=[
        //     "email.required"=>"Email không được để trống!",
        //     "email.email"=>"Email không hợp lệ!",
        //     "password.required"=>"Mật khẩu được để trống!",
        //     "password.min"=>"Mật khẩu phải tối thiểu 3 ký tự!",
        //     "password.max"=>"Mật khẩu tối đa 6 ký tự!",
        //     "password.required"=>"Mật khẩu không hợp lệ!",

        // ];

        // $rules = [
        //     "email"=>"required|email",
        //     "password"=>"required|min:3|max:6"
        // ];
        // $request->validate($rules,$messages);
        // return view("test1");
        // return $request->session()->get("password","123456");
        return $request->session()->get("email",);
        // return $request->session()->get("password",);

        // return $request->session()->all();
        // if(!$request->session()->has('123')){
        //     return "non";
        // }

    }
} 
