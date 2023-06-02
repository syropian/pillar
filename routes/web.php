<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterationController;
use App\Http\Controllers\PasswordResetsController;
// use App\Http\Controllers\EmailVerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::group(
    ['middleware' => 'guest'],
    function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::get('login', [LoginController::class, 'show'])->name('login.show');
            Route::post('login', [LoginController::class, 'store'])->name('login.store');

            Route::get('register', [RegisterationController::class, 'show'])->name('register.show');
            Route::post('register', [RegisterationController::class, 'store'])->name('register.store');

            Route::get('forgot-password', [PasswordResetsController::class, 'index'])->name('password.request');
            Route::post('forgot-password', [PasswordResetsController::class, 'store'])->name('password.email');
            Route::get('reset-password/{token}', [PasswordResetsController::class, 'show'])->name('password.reset');
            Route::post('reset-password', [PasswordResetsController::class, 'update'])->name('password.update');
        });
    }
);

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', function () {
        auth()->logout();

        return redirect()->route('home');
    })->name('logout');

    // Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class])
    //     ->middleware(['signed'])
    //     ->name('verification.verify');
});
