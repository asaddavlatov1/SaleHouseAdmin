<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    /**
     * Customize the validation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.required' => 'The phone number field is required.',
            'password.required' => 'The password field is required.',
        ];
    }
}
