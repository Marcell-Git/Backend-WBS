<?php

use Illuminate\Support\Facades\Route;
use Modules\ODP\Http\Controllers\ODPController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/odp', [ODPController::class, 'index']);
    Route::post('/odp', [ODPController::class, 'store']);
    Route::get('/odp/{id}', [ODPController::class, 'show']);
    Route::put('/odp/{id}', [ODPController::class, 'update']);
    Route::delete('/odp/{id}', [ODPController::class, 'destroy']);
});
