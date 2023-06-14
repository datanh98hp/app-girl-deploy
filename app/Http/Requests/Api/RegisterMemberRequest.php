<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RegisterMemberRequest extends FormRequest
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
            'user_name' => ['required', 'max:255', 'unique:members'],
            'password' => ['required', 'min:8'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống!',
            'name.max'=>'Tên tối đa 255 ký tự!',
            'user_name.required'=>'Tên tài khoản không được để trống!',
            'user_name.max'=>'Tên tài khoản tối đa 255 ký tự!',
            'user_name.unique'=>'Tên tài khoản Đã tồn tại!',
            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>'Mật khẩu ít nhất có 8 ký tự!',
            'password.confirmed'=>'Xác nhận mật khẩu không đúng!',
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
