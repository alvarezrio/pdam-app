<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pelanggan; // Pastikan ini mengarah ke model Pelanggan Anda

class TagihanFactory extends Factory
{
    public function definition()
    {
        // Memastikan setidaknya satu NIK tersedia dari tabel pelanggan
        $pelanggan_nik = Pelanggan::query()->inRandomOrder()->first()->nik;

        return [
            'tagihan_nik' => $pelanggan_nik,
            'tagihan_tglTagihan' => '2024-11-30',
            'tagihan_tglJatuhTempo' => '2024-12-15',
            'tagihan_jmlMeteran' => $this->faker->numberBetween(100, 1000),
            'tagihan_jmlTagihan' => $this->faker->numberBetween(100000, 500000),
            'tagihan_tglPembayaran' => null,
            'tagihan_jmlDibayar' => null,
            'tagihan_metodePembayaran' => null,
            'tagihan_statusPembayaran' => 'belum_dibayar',
            'tagihan_nokwitansi' => null,
            'tagihan_masaTagihan' => 'November 2024',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
