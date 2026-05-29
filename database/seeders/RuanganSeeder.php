<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    public function run(): void
    {
        Ruangan::updateOrCreate(
            ['kode_ruangan' => 'E208'],
            [
                'nama_ruangan' => 'Lab Sistem Informasi 2',
                'gedung' => 'E',
                'lantai' => 2,
                'kapasitas' => 30,
                'keterangan' => 'Labor lantai 2',
            ]
        );

        Ruangan::factory(9)->create();
    }
}
