<?php

use Illuminate\Support\Facades\Route;
use Modules\ODP\Http\Controllers\ODPController;

Route::get('/odp', [ODPController::class, 'index']);
