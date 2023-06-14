<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UpdateMemberRequest extends FormRequest
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
            'email' => ['required', 'max:255', 'unique:members,email,'.Auth::guard('api')->id()],
            'phone' => ['required', 'max:255', 'unique:members,phone,'.Auth::guard('api')->id()],
            'user_name' => ['required', 'max:255', 'unique:members,user_name,'.Auth::guard('api')->id()],
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống!',
            'name.max'=>'Tên tối đa 255 ký tự!',
            'email.required'=>'Email không được để trống!',
            'email.max'=>'Email tối đa 255 ký tự!',
            'email.unique'=>'Email Đã tồn tại!',
            'phone.required'=>'Số điện thoại không được để trống!',
            'phone.max'=>'Số điện thoại tối đa 255 ký tự!',
            'phone.unique'=>'Số điện thoại Đã tồn tại!',
            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>'Mật khẩu ít nhất có 8 ký tự!',
            'password.confirmed'=>'Xác nhận mật khẩu không đúng!',
            'user_name.required'=>'Tài khoản không được để trống!',
            'user_name.max'=>'Tài khoản tối đa 255 ký tự!',
            'user_name.unique'=>'Tài khoản Đã tồn tại!',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json( response()->json(
                [
                    'status' => false,
                    'msg'=>'Có lỗi xảy ra!',
                    'errors' => $errors,
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY))
        );
    }
}
