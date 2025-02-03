<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PelangganFactory extends Factory
{
    protected $model = Pelanggan::class;

    public function definition()
    {
        $this->faker = \Faker\Factory::create('id_ID');

        return [
            'nama' => $this->faker->name,
            'alamat' => "Bandung, " . $this->faker->streetName . " No. " . $this->faker->buildingNumber,
            'nik' => $this->faker->numerify('3277############'), // 16 digit NIK dengan awalan '3277'
            'noHp' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail
        ];
    }
}
