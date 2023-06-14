<?php

namespace App\Http\Requests\Member;

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
            'name' => ['required', 'max:255'],
            'user_name' => ['required', 'max:255', 'unique:members'],
            'password' => ['required', 'min:8'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống!',
            'name.max'=>'Tên tối đa 255 ký tự!',
            'user_name.required'=>'Tài khoản không được để trống!',
            'user_name.max'=>'Tài khoản tối đa 255 ký tự!',
            'user_name.unique'=>'Tài khoản Đã tồn tại!',
            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>'Mật khẩu ít nhất có 8 ký tự!',
        ];
    }
}
