<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        Pelanggan::factory()->count(100)->create(); // Memastikan 100 pelanggan dibuat
    }
}
