<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
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
    abstract public function rules();

    /**
     * @param Validator $validator
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function failedValidation(Validator $validator)
    {
        return response()->json([
            "errors" => $validator->errors()
        ],406);
    }

}
