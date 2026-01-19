<?php

namespace Modules\KategoriAduan\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriAduanSeeders extends Seeder
{
    public function run(): void
    {
        DB::table('kategori_aduan')->insert([
            [
                'nama_kategori' => 'Korupsi, Kolusi, Nepotisme (KKN)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Pelanggaran Kode Etik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Penyalahgunaan Wewenang Jabatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Pelanggaran Terhadap Standar Pelayanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
