<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');
Route::prefix('/auth')
    ->group(function () {
        Route::post('/register', [AuthController::class, 'register'])
            ->name('register');
        Route::post('/login', [AuthController::class, 'login'])
            ->name('login');
    });
require __DIR__ . '/api.php';
