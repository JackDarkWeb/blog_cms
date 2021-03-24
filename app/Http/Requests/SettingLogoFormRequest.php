<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingLogoFormRequest extends FormRequest
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
            "app_name" => ["required", "string", "max:225"],
            "file" => ["required", "image"],
            "active_app_name" => Rule::in([1, 0]),
            "active_logo" => Rule::in([1, 0]),
        ];
    }
}
