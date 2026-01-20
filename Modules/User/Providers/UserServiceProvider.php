<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class UserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::middleware('api')
           ->prefix('api')
           ->group(__DIR__.'/../Routes/api.php');
    }
}