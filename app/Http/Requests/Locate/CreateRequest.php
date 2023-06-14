<?php

namespace App\Http\Requests\Locate;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name'=>'required',
            'code'=>'required',
            'price'=>'integer',
            'price_old'=>'integer',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống!',
            'code.required'=>'Mã thiết bị định vị không được để trống!',
            'price.integer'=>'Giá phải là số nguyên! VD 100000',
            'price_old.integer'=>'Giá cũ phải là số nguyên! VD 100000',
        ];
    }
}
