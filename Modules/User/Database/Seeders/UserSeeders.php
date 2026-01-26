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
            [
                'username' => 'user1',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Rizky Ananda',
                'role' => 'user',
                'id_unit' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user2',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Dwi Saputri',
                'role' => 'user',
                'id_unit' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user3',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Ahmad Fauzan',
                'role' => 'user',
                'id_unit' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user4',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Siti Aisyah',
                'role' => 'user',
                'id_unit' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user5',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Bagus Pratama',
                'role' => 'user',
                'id_unit' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user6',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Nabila Khairunnisa',
                'role' => 'user',
                'id_unit' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user7',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Arif Setiawan',
                'role' => 'user',
                'id_unit' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user8',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Putri Maharani',
                'role' => 'user',
                'id_unit' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user9',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Fajar Nugroho',
                'role' => 'user',
                'id_unit' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user10',
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Lia Oktaviani',
                'role' => 'user',
                'id_unit' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
