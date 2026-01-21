<?php

use Illuminate\Support\Facades\Route;
use Modules\KategoriAduan\Http\Controllers\KategoriAduanController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/kategori-aduan', [KategoriAduanController::class, 'index']);
});

