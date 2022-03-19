<?php

namespace App\Http\Requests\Admin\School;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = \Route::input('id');
        return [
            'name' => [
                'required',
                'min:3',
                'max:100',
                'string',
                'unique:schools,name,' . $this->school
            ],
        ];
    }
}
