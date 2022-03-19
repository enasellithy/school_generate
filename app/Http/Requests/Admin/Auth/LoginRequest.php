<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
            ],
            'password' => 'required',
        ];
    }

    public function message()
    {
        return [
            'phone.required' => 'is field required',
            'password.required' => 'is field required',
        ];
    }
}
