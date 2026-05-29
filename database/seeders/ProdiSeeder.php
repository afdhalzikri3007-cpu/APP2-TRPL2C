<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        Prodi::updateOrCreate(
            ['kode_prodi' => 'MI'],
            [
                'nama_prodi' => 'Manajemen Informatika',
                'jenjang' => 'D3',
                'akreditasi' => 'Baik Sekali',
                'keterangan' => 'Program studi bidang sistem informasi terapan',
            ]
        );

        Prodi::updateOrCreate(
            ['kode_prodi' => 'TK'],
            [
                'nama_prodi' => 'Teknik Komputer',
                'jenjang' => 'D3',
                'akreditasi' => 'Baik Sekali',
                'keterangan' => 'Program studi bidang komputer dan jaringan',
            ]
        );

        Prodi::updateOrCreate(
            ['kode_prodi' => 'TRPL'],
            [
                'nama_prodi' => 'Teknologi Rekayasa Perangkat Lunak',
                'jenjang' => 'D4',
                'akreditasi' => 'Baik Sekali',
                'keterangan' => 'Program studi bidang pengembangan perangkat lunak',
            ]
        );

        Prodi::factory(3)->create();
    }
}
