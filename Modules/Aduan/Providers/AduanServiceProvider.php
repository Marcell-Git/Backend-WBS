<?php

namespace Modules\Aduan\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AduanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::middleware('api')
           ->prefix('api')
           ->group(__DIR__.'/../Routes/api.php');
    }
}