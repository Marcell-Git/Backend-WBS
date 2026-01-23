<?php

namespace Modules\Pelaku\Providers;

use Illuminate\Support\ServiceProvider;

class PelakuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }
}