<?php

use Illuminate\Support\Facades\Route;
use Modules\KategoriAduan\Http\Controllers\KategoriAduanController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/kategori-aduan', [KategoriAduanController::class, 'index']);
    Route::post('/kategori-aduan', [KategoriAduanController::class, 'store']);
    Route::get('/kategori-aduan/{id}', [KategoriAduanController::class, 'show']);
    Route::put('/kategori-aduan/{id}', [KategoriAduanController::class, 'update']);
    Route::delete('/kategori-aduan/{id}', [KategoriAduanController::class, 'destroy']);
});

