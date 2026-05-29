<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    /**
     * Nama tabel mengikuti instruksi tugas: tabel "ruangan".
     * Secara default Laravel akan mencari tabel "ruangans",
     * sehingga properti ini diperlukan.
     */
    protected $table = 'ruangan';

    protected $fillable = [
        'kode_ruangan',
        'nama_ruangan',
        'gedung',
        'lantai',
        'kapasitas',
        'keterangan',
    ];
}
