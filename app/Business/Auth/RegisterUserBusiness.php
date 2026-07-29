<?php

namespace App\Business\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUserBusiness
{
    /**
     * Execute a register from User
     */
    public function handle(array $data): User
    {
        return User::create([
            'username' => $data['text_username'],
            'email' => $data['text_email'],
            'password' => $data['text_password'],
        ]);
    }
}
