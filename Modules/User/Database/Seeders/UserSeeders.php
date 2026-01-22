<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'nama_lengkap' => 'Administrator',
                'id_unit' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'User',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'User Name',
                'role' => 'user',
                'id_unit' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
