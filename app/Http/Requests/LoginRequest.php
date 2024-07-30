<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone'    => 'required|string|regex:' . PHONE_REGEX,
            'password' => 'required|string|min:5',
        ];
    }

    protected function prepareForValidation(): void
    {
        $phoneNumber = $this->phone;

        $this->merge([
                         'phone' => preg_replace('/\D+/', '', $phoneNumber),
                     ]);
    }
}
