<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;

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

        event(new Registered($user));

        return redirect()->route('dashboard');
    }
}
