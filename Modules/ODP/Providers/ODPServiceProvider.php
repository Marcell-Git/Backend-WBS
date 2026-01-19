<?php

namespace Modules\ODP\Providers;

use Illuminate\Support\ServiceProvider;

class ODPServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }
}