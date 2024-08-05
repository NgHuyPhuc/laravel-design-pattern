<?php

namespace App\Services\Admin;

use App\Http\Requests\AddUserRequest;
use Illuminate\Http\Request;
use App\Repositories\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserAdminService
{

    protected $userService;
    public function __construct(UserRepository $userRepository)
    {
        $this->userService = $userRepository;
    }
    public function getall()
    {
        return $this->userService->all();
    }
    public function paginate($perPage = 5, $pageName = 'page', $page = null)
    {
        return $this->userService->paginate($perPage, ['*'], $pageName, $page);
    }
    public function create(AddUserRequest $addUserRequest){
        $data = [
            'fullname' => $addUserRequest->fullname,
            'email' => $addUserRequest->email,
            'phone' => $addUserRequest->phone,
            'password' => Hash::make($addUserRequest->password),
            'address' => $addUserRequest->address,
            'level' => $addUserRequest->level,
        ];
        return $this->userService->create($data);
    }
    public function edit($id)
    {
        return $this->userService->find($id);
        
    }
    public function update(Request $request, $id)
    {
        $data = [
            'email' => $request->email,
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'level' => $request->level,
        ];
        return $this->userService->update($id, $data);
    }
    public function delete($id)
    {
        return $this->userService->delete($id);
    }
    public function find($id){
        return $this->userService->find($id);
    }
}
