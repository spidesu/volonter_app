<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class VacancyTouchTag extends FormRequest
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
            'tag_id' => 'required',
            //'description' => 'required',
            //'date_start' => 'required',
            //'date_end' => 'required',
            //'address' => 'required',
            //'city'  => 'required',
        ];
    }
    /*public function failedValidation(Validator $validator)
    {
        return response()->json([
            "errors" => $validator->errors()
        ],406);
    }*/
}
