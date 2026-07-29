<?php

namespace App\Http\Controllers\Auth;

use App\Business\Auth\RegisterUserBusiness;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;

class RegisterController extends Controller
{
    /**
     * Show the form to create a new user.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * submit a new user.
     */
    public function store(RegisterUserRequest $request, RegisterUserBusiness $business)
    {
        $business->handle($request->validated());
        return redirect('/login')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
