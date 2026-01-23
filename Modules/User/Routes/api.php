<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

Route::post('/register', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'showUser']);
    Route::get('/users/{id}/search', [UserController::class, 'search']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'updatePassword']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});