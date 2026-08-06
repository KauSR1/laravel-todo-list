<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'text_username' => 'required|string|min:4|max:15|unique:users,username',
            'text_email' => 'required|email|string|max:255|unique:users,email',
            'text_password' => 'required|string|min:8|max:64|confirmed',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'text_username.required' => 'The username field is required.',
            'text_username.min' => 'The username must be at least 4 characters.',
            'text_username.max' => 'The username must not exceed 15 characters.',
            'text_username.unique' => 'This username is already taken.',

            'text_email.required' => 'The email field is required.',
            'text_email.email' => 'Please enter a valid email address.',
            'text_email.unique' => 'This email is already registered.',

            'text_password.required' => 'The password field is required.',
            'text_password.min' => 'The password must be at least 8 characters.',
            'text_password.max' => 'The password must not exceed 64 characters.',
            'text_password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
