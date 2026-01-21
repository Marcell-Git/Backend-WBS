<?php

use Illuminate\Support\Facades\Route;
use Modules\ODP\Http\Controllers\ODPController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/odp', [ODPController::class, 'index']);
});
