<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingContactFormRequest extends FormRequest
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
            "title" => ["required", "max:255"],
            "sub_title" => ["required", "max:255"],
            "description" => ["required", "string"],
            "company_name" => ["max:255"],
            "address" => ["max:255"],
            "phone" => ["max:255"],
            "website" => ["max:255"],
            "program" => ["max:255"],
            "required_facultative_field_phone" => Rule::in([1, 0]),

        ];
    }
}
