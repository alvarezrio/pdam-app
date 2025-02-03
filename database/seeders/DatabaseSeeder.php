<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tagihan;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            TagihanSeeder::class,
        ]);
    }
}

class TagihanSeeder extends Seeder
{
    public function run()
    {
        // Mengambil semua NIK dari pelanggan
        $pelangganNIKs = Pelanggan::all()->pluck('nik');

        // Loop melalui setiap NIK dan buat tagihan dengan menggunakan factory
        foreach ($pelangganNIKs as $nik) {
            Tagihan::factory()->create([
                'tagihan_nik' => $nik,
                'tagihan_tglTagihan' => '2024-11-30',
                'tagihan_tglJatuhTempo' => '2024-12-15',
                'tagihan_tglPembayaran' => null,
                'tagihan_jmlDibayar' => null,
                'tagihan_metodePembayaran' => null,
                'tagihan_statusPembayaran' => 'belum_dibayar',
                'tagihan_nokwitansi' => null,
                'tagihan_masaTagihan' => 'November 2024'
            ]);
        }
    }
}
