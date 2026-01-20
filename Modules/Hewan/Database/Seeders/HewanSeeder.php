<?php

namespace Modules\Hewan\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HewanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hewan')->insert([
            ['nama' => 'Ikan'],
            ['nama' => 'Kucing'],
            ['nama' => 'Anjing'],
            ['nama' => 'Panda'],
            ['nama' => 'Harimau'],
            ['nama' => 'Singa'],
            ['nama' => 'Gajah'],
            ['nama' => 'Kuda'],
            ['nama' => 'Sapi'],
            ['nama' => 'Kambing'],
            ['nama' => 'Domba'],
            ['nama' => 'Ayam'],
            ['nama' => 'Bebek'],
            ['nama' => 'Burung'],
            ['nama' => 'Elang'],
            ['nama' => 'Merpati'],
            ['nama' => 'Ular'],
            ['nama' => 'Kura-kura'],
            ['nama' => 'Buaya'],
            ['nama' => 'Kodok'],
            ['nama' => 'Katak'],
            ['nama' => 'Kelinci'],
            ['nama' => 'Tikus'],
            ['nama' => 'Landak'],
            ['nama' => 'Rusa'],
            ['nama' => 'Zebra'],
            ['nama' => 'Jerapah'],
            ['nama' => 'Badak'],
            ['nama' => 'Kuda Nil'],
            ['nama' => 'Lumba-lumba'],
            ['nama' => 'Paus'],
            ['nama' => 'Hiu'],
            ['nama' => 'Gurita'],
            ['nama' => 'Cumi-cumi'],
            ['nama' => 'Kepiting'],
            ['nama' => 'Udang'],
            ['nama' => 'Kupu-kupu'],
            ['nama' => 'Lebah'],
            ['nama' => 'Semut'],
            ['nama' => 'Belalang'],
            ['nama' => 'Jangkrik'],
            ['nama' => 'Kecoak'],
            ['nama' => 'Lalat'],
            ['nama' => 'Nyamuk'],
            ['nama' => 'Tokek'],
            ['nama' => 'Cicak'],
            ['nama' => 'Iguana'],
            ['nama' => 'Komodo'],
            ['nama' => 'Musang'],
            ['nama' => 'Beruang'],
        ]);
    }
}