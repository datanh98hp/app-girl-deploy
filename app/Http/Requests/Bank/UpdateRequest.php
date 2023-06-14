<?php

namespace App\Http\Requests\Bank;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'account'=>'required',
            'number'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên ngân hàng không được để trống!',
            'account.required'=>'Chủ tài khoản được để trống!',
            'number.required'=>'Số tài khoản không được để trống!',
        ];
    }
}
