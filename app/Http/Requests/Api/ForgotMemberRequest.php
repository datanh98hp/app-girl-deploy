<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ForgotMemberRequest extends FormRequest
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
            'email' => ['required', 'max:255'],
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được để trống!',
            'email.max'=>'Email tối đa 255 ký tự!',
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
