<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withProviders([
        App\Providers\AppServiceProvider::class,

        Modules\User\Providers\UserServiceProvider::class,
        Modules\Auth\Providers\AuthServiceProvider::class,
        Modules\KategoriAduan\Providers\KategoriAduanServiceProvider::class,
        Modules\Aduan\Providers\AduanServiceProvider::class,
        Modules\ODP\Providers\ODPServiceProvider::class,
        Modules\BuktiAduan\Providers\BuktiAduanServiceProvider::class,
        Modules\Pelaku\Providers\PelakuServiceProvider::class,
    ])
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
