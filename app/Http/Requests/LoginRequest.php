<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
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
        $this->request->add(['remember' => $this->has('remember')]);

        $validation = [
            'password' => [
                'required',
                'string',
                Password::min(6)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
            'captcha' => ['required', 'captcha'],
            'remember' => ['required', 'boolean'],
            'username' => ['required', 'string'],
        ];

        return $this->isMethod('POST') ? $validation : [];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Telefon raqamni kiritish majburiy',
            'phone.regex' => 'Telefon raqami formati xato!',
            'password.required' => 'Parol kiritilishi shart',
            'password' => 'Parolda kichik, katta lotin harflari, son va belgi qatnashishi shart',
            'captcha.required' => 'Rasmdagi belgilarni kiritmadingiz',
            'captcha.captcha' => 'Rasmdagi belgilarni noto\'g\'ri kiritdingiz',
            'username.required' => 'Elektron pochta yoki telefon raqami kiritilishi shart',
        ];
    }
}
