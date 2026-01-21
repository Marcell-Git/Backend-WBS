<?php

use Illuminate\Support\Facades\Route;
use Modules\Aduan\Http\Controllers\AduanController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/aduan', [AduanController::class, 'index']);
    Route::get('/aduan/summary', [AduanController::class, 'getSummary']);
    Route::get('/aduan/detail/{id}', [AduanController::class, 'showDetail']);
    Route::post('/aduan', [AduanController::class, 'store']);
    Route::get('/aduan/{id}', [AduanController::class, 'show']);
    Route::put('/aduan/{id}', [AduanController::class, 'update']);
    Route::put('/aduan/{id}/status', [AduanController::class, 'updateStatus']);
    Route::delete('/aduan/{id}', [AduanController::class, 'destroy']);
});
