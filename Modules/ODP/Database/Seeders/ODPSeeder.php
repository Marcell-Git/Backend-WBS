<?php

namespace Modules\ODP\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ODPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('odp')->insert([
            ['nama_unit' => 'SEKRETARIAT DAERAH'],
            ['nama_unit' => 'SEKRETARIAT DPRD'],
            ['nama_unit' => 'INSPEKTORAT'],
            ['nama_unit' => 'Dinas Pendidikan'],
            ['nama_unit' => 'DISPARBUDPORA'],
            ['nama_unit' => 'Dinas Kesehatan'],
            ['nama_unit' => 'DISSOSP3AKB'],
            ['nama_unit' => 'DISDUKCAPIL'],
            ['nama_unit' => 'DISPERMASDES'],
            ['nama_unit' => 'DPMPTSP'],
            ['nama_unit' => 'DISDAGKOP UKM'],
            ['nama_unit' => 'DISPERINAKER'],
            ['nama_unit' => 'DISKOMINFO'],
            ['nama_unit' => 'DISPERWASKIM'],
            ['nama_unit' => 'DPUPR'],
            ['nama_unit' => 'Dinas Perhubungan'],
            ['nama_unit' => 'Dinas LHK'],
            ['nama_unit' => 'DPKPP'],
            ['nama_unit' => 'Dinas ARPUS'],
            ['nama_unit' => 'SATPOL PP'],
            ['nama_unit' => 'BKPPD'],
            ['nama_unit' => 'BPKD'],
            ['nama_unit' => 'BAPPEDA'],
            ['nama_unit' => 'BPBD'],
            ['nama_unit' => 'KESBANGPOL'],
            ['nama_unit' => 'Kecamatan Prambanan'],
            ['nama_unit' => 'Kecamatan Gantiwarno'],
            ['nama_unit' => 'Kecamatan Wedi'],
            ['nama_unit' => 'Kecamatan Bayat'],
            ['nama_unit' => 'Kecamatan Cawas'],
            ['nama_unit' => 'Kecamatan Trucuk'],
            ['nama_unit' => 'Kecamatan Kebonarum'],
            ['nama_unit' => 'Kecamatan Jogonalan'],
            ['nama_unit' => 'Kecamatan Manisrenggo'],
            ['nama_unit' => 'Kecamatan Karangnongko'],
            ['nama_unit' => 'Kecamatan Ceper'],
            ['nama_unit' => 'Kecamatan Pedan'],
            ['nama_unit' => 'Kecamatan Karangdowo'],
            ['nama_unit' => 'Kecamatan Juwiring'],
            ['nama_unit' => 'Kecamatan Wonosari'],
            ['nama_unit' => 'Kecamatan Delanggu'],
            ['nama_unit' => 'Kecamatan Polanharjo'],
            ['nama_unit' => 'Kecamatan Karanganom'],
            ['nama_unit' => 'Kecamatan Tulung'],
            ['nama_unit' => 'Kecamatan Jatinom'],
            ['nama_unit' => 'Kecamatan Kemalang'],
            ['nama_unit' => 'Kecamatan Ngawen'],
            ['nama_unit' => 'Kecamatan Kalikotes'],
            ['nama_unit' => 'Kecamatan Klaten Utara'],
            ['nama_unit' => 'Kecamatan Klaten Tengah'],
            ['nama_unit' => 'Kecamatan Klaten Selatan'],
        ]);
    }
}