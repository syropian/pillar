<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;

test('renders the login page')
    ->get('/auth/login')
    ->assertStatus(200);

test('a user can login', function () {
    $user = User::factory()->create();

    $this->post('/auth/login', [
        'email' => $user->email,
        'password' => 'password',
    ])->assertRedirect(RouteServiceProvider::HOME);

    $this->assertAuthenticated();
});

test('logging in requires a valid email and password', function () {
    $user = User::factory()->create();

    $this->post('/auth/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});
