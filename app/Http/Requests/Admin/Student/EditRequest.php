<?php

namespace App\Http\Requests\Admin\Student;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:4|max:25',
            'school_id' => 'numeric|required|exists:schools,id',
        ];
    }
}
