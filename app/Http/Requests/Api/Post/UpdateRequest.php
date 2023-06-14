<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

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
            'slug'=>'required|unique:posts,slug,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống!',
            'slug.required'=>'Url không được để trống!',
            'slug.unique'=>'Url không được trùng!',
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
