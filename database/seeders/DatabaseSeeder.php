<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\User\Database\Seeders\UserSeeders;
use Modules\KategoriAduan\Database\Seeders\KategoriAduanSeeders;
use Modules\Hewan\Database\Seeders\HewanSeeder;
use Modules\Aktivitas\Database\Seeders\AktivitasSeeder;
use Modules\ODP\Database\Seeders\ODPSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeders::class,
            KategoriAduanSeeders::class,
            HewanSeeder::class,
            AktivitasSeeder::class,
            ODPSeeder::class,
        ]);

    }
}
