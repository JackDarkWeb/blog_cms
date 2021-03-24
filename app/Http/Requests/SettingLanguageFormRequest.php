<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingLanguageFormRequest extends FormRequest
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
            "name" => ["required", "string", "max:25", "unique:setting_language_translations"],
            "iso_code" => ["required", "string", "min:2", "max:3"]
        ];
    }
}
