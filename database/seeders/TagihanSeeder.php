<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tagihan;

class TagihanSeeder extends Seeder
{
    public function run()
    {
        Tagihan::factory()->count(96)->create(); // Buat 50 data tagihan
    }
}
