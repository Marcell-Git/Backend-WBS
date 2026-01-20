<?php

namespace Modules\Aktivitas\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AktivitasServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::middleware('api')
           ->prefix('api')
           ->group(__DIR__.'/../Routes/api.php');
    }
}