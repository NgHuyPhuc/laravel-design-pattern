<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //
    public function getLogin(){
        return view("backend/login");
    }
    
    public function postLogin(LoginRequest $loginRequest){
        // dd(1);
        // $rules = [
        //     "email"=>"required|email",
        //     "password"=>"required|min:3|max:6"
        // ];
        // $messages=[
        //     "email.required"=>"Email không được để trống!",
        //     "email.email"=>"Email không hợp lệ!",
        //     "password.required"=>"Mật khẩu được để trống!",
        //     "password.min"=>"Mật khẩu phải tối thiểu 3 ký tự!",
        //     "password.max"=>"Mật khẩu tối đa 6 ký tự!",
        //     "password.required"=>"Mật khẩu không hợp lệ!",
        // ];
        // $request->validate($rules,$messages);

        // $users = DB::table('users')->where("email",$request->email)
        //                             ->where('password',$request->password)
        //                             ->get()->all();

        
        // if($request->hasAny(["email","password"])){
        //     if(count($users)>0){
        //         $request->session()->put("email",$request->email);
        //         return redirect("/admin");
        //     }
        //     else{
        //         return redirect()->back()->withErrors("Tài khoản không hợp lệ");
        //     }
        // }
        // $request->validate($rules,$messages);
        // return view("backend/login");
        if(Auth::attempt(['email' => $loginRequest->email, 'password' => $loginRequest->password])){
                return redirect("/admin");
        } 
        else{
            return redirect()->back()->withErrors("Tài khoản không hợp lệ");
        }
    }
}
