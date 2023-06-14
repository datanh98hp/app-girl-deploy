<?php

namespace App\Http\Requests\User;

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
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống!',
            'name.max'=>'Tên tối đa 255 ký tự!',
            'email.required'=>'Email không được để trống!',
            'email.email'=>'Email không đúng định dạng!',
            'email.max'=>'Email tối đa 255 ký tự!',
            'email.unique'=>'Email Đã tồn tại!',
            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>'Mật khẩu ít nhất có 8 ký tự!',
        ];
    }
}
