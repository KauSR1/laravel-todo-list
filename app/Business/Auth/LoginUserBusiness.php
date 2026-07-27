<?php

namespace App\Business\Auth;

use Illuminate\Support\Facades\Auth;

class LoginUserBusiness
{
    /**
     * Execute authenticate from User
     */

    public function authenticate(string $username, string $password)
    {
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $user = Auth::user();
            $user->save();

            return true;
        }
        return false;
    }
}
