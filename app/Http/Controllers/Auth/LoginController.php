<?php

namespace App\Http\Controllers\Auth;

use App\Business\Auth\LogoutUserBusiness;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Business\Auth\LoginUserBusiness;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginUserRequest $request, LoginUserBusiness $loginBusiness)
    {
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        if (!$loginBusiness->authenticate($username, $password)) {
            return back()
                ->withInput($request->only('text_username'))
                ->withErrors(['text_username' => 'Invalid username or password.']);
        }

        $request->session()->regenerate();

        return to_route('home');
    }

    public function logout(LogoutUserBusiness $logoutBusiness, Request $request)
    {
        $logoutBusiness->execute($request);
        return to_route('login');
    }
}
