<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterationController;
use Illuminate\Support\Facades\Route;

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
        Route::get('/auth/login', [LoginController::class, 'show'])->name('login.show');
        Route::post('/auth/login', [LoginController::class, 'store'])->name('login.store');

        Route::get('/register', [RegisterationController::class, 'show'])->name('register.show');
        Route::post('/register', [RegisterationController::class, 'store'])->name('register.store');
    }
);
