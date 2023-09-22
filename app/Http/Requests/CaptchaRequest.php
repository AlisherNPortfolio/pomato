<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaptchaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'captcha' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'captcha.required' => 'Rasmdagi belgilarni kiritmadingiz',
            'captcha.captcha' => 'Rasmdagi belgilarni noto\'g\'ri kiritdingiz',
        ];
    }
}
