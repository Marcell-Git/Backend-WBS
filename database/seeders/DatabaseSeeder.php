<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\User\Database\Seeders\UserSeeders;
use Modules\KategoriAduan\Database\Seeders\KategoriAduanSeeders;

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
        ]);
    }
}
