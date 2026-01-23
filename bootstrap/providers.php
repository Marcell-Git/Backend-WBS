<?php

return [
    App\Providers\AppServiceProvider::class,

    Modules\User\Providers\UserServiceProvider::class,
    Modules\Auth\Providers\AuthServiceProvider::class,
    Modules\KategoriAduan\Providers\KategoriAduanServiceProvider::class,
    Modules\Aduan\Providers\AduanServiceProvider::class,
    Modules\ODP\Providers\ODPServiceProvider::class,
    Modules\BuktiAduan\Providers\BuktiAduanServiceProvider::class,
    Modules\Pelaku\Providers\PelakuServiceProvider::class,
];
