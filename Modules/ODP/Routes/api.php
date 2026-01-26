<?php

use Illuminate\Support\Facades\Route;
use Modules\ODP\Http\Controllers\ODPController;

Route::get('/odp', [ODPController::class, 'index']);
Route::get('/odp/all', [ODPController::class, 'getAll']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/odp', [ODPController::class, 'store']);
    Route::delete('/odp/{id}', [ODPController::class, 'destroy']);
}); 
