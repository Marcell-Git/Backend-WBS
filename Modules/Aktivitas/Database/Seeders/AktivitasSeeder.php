<?php

namespace Modules\Aktivitas\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktivitasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('aktivitas')->insert([
            ['nama' => 'Memancing'],
            ['nama' => 'Membaca'],
            ['nama' => 'Menulis'],
            ['nama' => 'Berlari'],
            ['nama' => 'Berjalan'],
            ['nama' => 'Bersepeda'],
            ['nama' => 'Berenang'],
            ['nama' => 'Memasak'],
            ['nama' => 'Makan'],
            ['nama' => 'Minum'],
            ['nama' => 'Tidur'],
            ['nama' => 'Bangun'],
            ['nama' => 'Bermain'],
            ['nama' => 'Bernyanyi'],
            ['nama' => 'Menari'],
            ['nama' => 'Melukis'],
            ['nama' => 'Menggambar'],
            ['nama' => 'Memotret'],
            ['nama' => 'Merekam'],
            ['nama' => 'Ngoding'],
            ['nama' => 'Debugging'],
            ['nama' => 'Belajar'],
            ['nama' => 'Mengajar'],
            ['nama' => 'Bekerja'],
            ['nama' => 'Istirahat'],
            ['nama' => 'Berdoa'],
            ['nama' => 'Bertani'],
            ['nama' => 'Berkebun'],
            ['nama' => 'Memanen'],
            ['nama' => 'Berjualan'],
            ['nama' => 'Belanja'],
            ['nama' => 'Mengantar'],
            ['nama' => 'Menjemput'],
            ['nama' => 'Membersihkan'],
            ['nama' => 'Menyapu'],
            ['nama' => 'Mengepel'],
            ['nama' => 'Mencuci'],
            ['nama' => 'Menyetrika'],
            ['nama' => 'Memperbaiki'],
            ['nama' => 'Merakit'],
            ['nama' => 'Mengangkat'],
            ['nama' => 'Mendorong'],
            ['nama' => 'Menarik'],
            ['nama' => 'Mendaki'],
            ['nama' => 'Berkemah'],
            ['nama' => 'Menjelajah'],
            ['nama' => 'Mengamati'],
            ['nama' => 'Menonton'],
            ['nama' => 'Mendengarkan'],
            ['nama' => 'Berpikir'],
        ]);
    }
}