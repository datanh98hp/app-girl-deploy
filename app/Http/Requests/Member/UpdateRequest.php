<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'unique:members,email,'.request()::route()->parameter('member')],
            'phone' => ['required', 'max:255', 'unique:members,phone,'.request()::route()->parameter('member')],
            'user_name' => ['required', 'max:255', 'unique:members,user_name,'.request()::route()->parameter('member')]
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
            'email.required'=>'Email không được để trống!',
            'email.max'=>'Email tối đa 255 ký tự!',
            'email.unique'=>'Email Đã tồn tại!',
            'phone.required'=>'Số điện thoại không được để trống!',
            'phone.max'=>'Số điện thoại tối đa 255 ký tự!',
            'phone.unique'=>'Số điện thoại Đã tồn tại!',
        ];
    }
}
