<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paketLayanan = [
            ['nama_paket' => 'Home 1', 'deskripsi' => 'Speed boost 10 Mbps', 'harga' => '160.000'],
            ['nama_paket' => 'Home 2', 'deskripsi' => 'Speed boost 20 Mbps', 'harga' => '220.000'],
            ['nama_paket' => 'Home 3', 'deskripsi' => 'Speed boost 30 Mbps', 'harga' => '260.000'],
            ['nama_paket' => 'Home 4', 'deskripsi' => 'Speed boost 50 Mbps', 'harga' => '350.000'],
            ['nama_paket' => 'Home 5', 'deskripsi' => 'Speed boost 100 Mbps', 'harga' => '460.000'],
        ];

        DB::table('paket_layanan')->insert($paketLayanan);
    }
}
