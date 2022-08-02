<?php

class auth
{
    Route::prefix('/v1')->group(function () {
    Route::post('/login', [App\Http\Controllers\v1\AuthController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\v1\AuthController::class, 'register']);
    Route::middleware(['token'])->group(function () {
        Route::delete('/logout', [App\Http\Controllers\v1\AuthController::class, 'logout']);
        Route::post('/refresh', [App\Http\Controllers\v1\AuthController::class, 'refresh']);

        Route::prefix('/users')->group(function () {
            Route::get('/', [App\Http\Controllers\v1\UserController::class, 'get_profile']);
            Route::post('/', [App\Http\Controllers\v1\UserController::class, 'update_profile']);
            Route::put('/change-pass', [App\Http\Controllers\v1\UserController::class, 'change_password']);

            Route::get('/tokens', [App\Http\Controllers\v1\UserTokensController::class, 'user_tokens']);
        });
    });
}
