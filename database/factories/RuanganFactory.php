<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruangan>
 */
class RuanganFactory extends Factory
{
    public function definition(): array
    {
        $gedung = fake()->randomElement(['A', 'B', 'C', 'D', 'E']);
        $lantai = fake()->numberBetween(1, 4);
        $nomor = fake()->unique()->numberBetween(1, 99);

        return [
            'kode_ruangan' => sprintf('%s%d%02d', $gedung, $lantai, $nomor),
            'nama_ruangan' => fake()->randomElement([
                'Lab Sistem Informasi',
                'Lab Pemrograman',
                'Ruang Teori',
                'Lab Jaringan',
                'Ruang Seminar',
            ]),
            'gedung' => $gedung,
            'lantai' => $lantai,
            'kapasitas' => fake()->randomElement([20, 25, 30, 35, 40]),
            'keterangan' => 'Ruangan lantai ' . $lantai . ' Gedung ' . $gedung,
        ];
    }
}
