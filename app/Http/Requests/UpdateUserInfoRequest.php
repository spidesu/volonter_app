<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInfoRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => ['max:255'],
            'email' => ['email', 'max:255'],
            'password' => ['nullable', 'min:6'],
            'role_id'  => [],
            'first_name' => ['max:255'],
            'last_name' => ['max:255'],
            'middle_name' => ['max:255'],
            'phone'     => [],
        ];
    }
}
