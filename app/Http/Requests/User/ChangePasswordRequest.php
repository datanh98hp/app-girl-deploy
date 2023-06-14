<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ];
    }
    public function messages()
    {
        return [
            'old_password.required'=>'Mật khẩu cũ không được để trống!',
            'new_password.required'=>'Mật khẩu mới không được để trống!',
            'confirm_password.required'=>'Mật khẩu nhập lại không được để trống!',
            'confirm_password.same'=>'Mật khẩu nhập lại không trùng khớp!',
        ];
    }
}
