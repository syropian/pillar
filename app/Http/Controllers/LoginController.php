<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show()
    {
        return hybridly('auth.login');
    }

    public function store(LoginRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
    }
}
