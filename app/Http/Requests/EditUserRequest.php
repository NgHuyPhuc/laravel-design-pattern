<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email"=>[
                "required",
                Rule::unique("users")->ignore($this->id),
            ],
            "fullname"=>"required",
            "password"=>"required",
            // "phone"=>"required",
            // "level"=>"required",
        ];
    }
    public function messages()
    {
        return [
            "email.required"=>"Email không được để trống !",
            "email.unique"=>"Email không được phép trùng !",
            "fullname.required"=>"Tên không được để trống !",
            "password.required"=>"Mật khẩu không được để trống",
            // "level.required"=>"Giá sản phẩm khong được để trống !",
        ];
    }
}
