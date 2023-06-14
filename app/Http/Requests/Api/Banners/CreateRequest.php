<?php

namespace App\Http\Requests\Api\Banners;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

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
            'image'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên banner không được để trống!',
            'image.required'=>'Ảnh banner không được để trống!',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(
                [
                    'status' => false,
                    'msg'=>'Có lỗi xảy ra!',
                    'errors' => $errors,
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}