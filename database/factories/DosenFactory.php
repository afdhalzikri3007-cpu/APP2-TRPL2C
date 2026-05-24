<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nidn'         => fake()->bothify('##########'),
            'nama_lengkap' => fake()->name(),
            'tempat_lahir' => fake()->city(),
            'tgl_lahir'    => fake()->date('Y-m-d'),
            'email'        => fake()->unique()->safeEmail(),
            'prodi'        => fake()->randomElement(['MI', 'TEKOM', 'TRPL']),
            'alamat'       => fake()->address(),
        ];
    }
}
