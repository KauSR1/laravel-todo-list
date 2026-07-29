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

    public function messages(): array
    {
        return [
            'text_username.required' => 'Username precisa ser preenchido',
            'text_username.min' => 'Username deve ter ao menos 4 caracteres',
            'text_username.max' => 'Username deve ter no máximo 15 caracteres',
            'text_username.unique' => 'Este username já existe na aplicação',

            'text_email.required' => 'Email precisa ser preenchido',
            'text_email.email' => 'Insira um endereço de email válido',
            'text_email.unique' => 'Este email já consta como cadastrado na aplicação',

            'text_password.required' => 'Password precisa ser preenchido',
            'text_password.min' => 'Password deve ter ao menos 8 caracteres',
            'text_password.max' => 'Password deve ter no máximo 64 caracteres',
            'text_password.confirmed' => 'As senhas precisam ser iguais',
        ];
    }
}
