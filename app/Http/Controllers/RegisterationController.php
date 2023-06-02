<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterationController extends Controller
{
    public function show()
    {
        return hybridly('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
