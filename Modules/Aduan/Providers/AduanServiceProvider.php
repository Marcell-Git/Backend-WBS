<?php

namespace Modules\Aduan\Providers;

use Illuminate\Support\ServiceProvider;

class AduanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }
}