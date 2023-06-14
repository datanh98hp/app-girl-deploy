<?php

namespace App\Http\Requests\Post;

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
            'views'=>'integer',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống!',
            'views.integer'=>'Lượt xem phải là số nguyên! VD 100000',
        ];
    }
}
