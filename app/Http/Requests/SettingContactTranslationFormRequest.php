<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingContactTranslationFormRequest extends FormRequest
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
        ];
    }
}
