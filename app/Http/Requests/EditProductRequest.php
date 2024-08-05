<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProductRequest extends FormRequest
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
            // "code"=>"required|unique:products,code,".$this->id,
            "code"=>[
                "required",
                Rule::unique("products")->ignore($this->id),
            ],        
            "name"=>"required",
            "price"=>"required",
            "info"=>"required",
            "describer"=>"required",
        ];
    }
    public function messages()
    {
        return [
            "code.required"=>"Mã sản phẩm không được để trống !",
            "code.unique"=>"Mã sản phẩm không được phép trùng !",
            "name.required"=>"Tên sản phẩm không được để trống !",
            "price.required"=>"Giá sản phẩm khong được để trống !",
            "info.required"=>"Thông tin chi tiết sản phẩm không được để trống !",
            "describer.required"=>"Thông tin mô tả sản phẩm không được để trống !",
        ];
    }
}
