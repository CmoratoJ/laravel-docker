<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Middleware\api\v1\ProtectedRouteAuth;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // AuthController
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::middleware(ProtectedRouteAuth::class)->group(function () {
            Route::post('me', 'me');
            Route::post('logout', 'logout');
        });
    });

    // UserController
    Route::controller(UserController::class)->group(function () {
        Route::middleware(ProtectedRouteAuth::class)->group(function () {
            Route::get('/users/{id}', 'findById');
            Route::get('/users', 'findAll');
            Route::post('/users', 'store');
            Route::put('/users/{id}', 'update');
            Route::delete('/users/{id}', 'destroy');
        });
    });
});
