<?php

namespace Modules\BuktiAduan\Providers;

use Illuminate\Support\ServiceProvider;

class BuktiAduanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }
}