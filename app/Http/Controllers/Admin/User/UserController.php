<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use App\Repositories\Repository\UserRepository;
use App\Services\Admin\UserAdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    protected $user;
    public function __construct(UserAdminService $userService)
    {
        $this->user = $userService;
    }
    public function index()
    {
        // $user = User::orderBy("id","DESC")->paginate(5);
        // $user->getall();
        
        // return view("backend/user/listuser",["user"=>$this->user->all()]);

        return view("backend/user/listuser",["user"=>$this->user->paginate()]);
    }
    public function create()
    {
        return view("backend/user/adduser");
    }
    public function insert(AddUserRequest $addUserRequest){
        // $user = new User();
        // $user->fullname = $addUserRequest->fullname;
        // $user->email = $addUserRequest->email;
        // $user->password = Hash::make($addUserRequest->password);
        // $user->phone = $addUserRequest->phone;
        // $user->address = $addUserRequest->address;
        // $user->level = $addUserRequest->level;
        // $user->save();


        $this->user->create($addUserRequest);
        return redirect("/admin/user");
    }
    public function edit($id){
        // $user = User::find($id)->toArray();
        $user = $this->user->edit($id);
        return view("backend/user/edituser",["user"=>$user]);
    }
    public function update(EditUserRequest $editUserRequest,$id){
        // $user = User::find($id);
        // $user->fullname = $editUserRequest->fullname;
        // $user->email = $editUserRequest->email;
        // $user->password = Hash::make($editUserRequest->password);
        // $user->phone = $editUserRequest->phone;
        // $user->address = $editUserRequest->address;
        // $user->level = $editUserRequest->level;
        // $user->save();
        $this->user->update($editUserRequest,$id);
        $editUserRequest->session()->flash("alert", "Đã sửa thành công");

        return redirect("/admin/user");
    }
    public function delete(Request $request ,$id){
        $finddeluser = $this->user->find($id);
        $this->user->delete($id);
        $request->session()->flash('delname', $finddeluser->email);
        $request->session()->flash("alert", "Đã xóa thành công user ");
        return redirect("/admin/user");
    }

}
