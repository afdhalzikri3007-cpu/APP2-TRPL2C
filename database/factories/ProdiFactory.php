<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prodi>
 */
class ProdiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode_prodi' => fake()->unique()->bothify('PRD-##'),
            'nama_prodi' => 'Program Studi ' . fake()->words(2, true),
            'jenjang' => fake()->randomElement(['D3', 'D4']),
            'akreditasi' => fake()->randomElement(['Baik', 'Baik Sekali', 'Unggul']),
            'keterangan' => fake()->sentence(),
        ];
    }
}
