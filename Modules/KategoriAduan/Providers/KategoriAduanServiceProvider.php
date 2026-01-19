<?php

namespace Modules\KategoriAduan\Providers;

use Illuminate\Support\ServiceProvider;

class KategoriAduanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }
}