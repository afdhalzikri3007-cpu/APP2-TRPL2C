<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ruangan', 20)->unique();
            $table->string('nama_ruangan', 150);
            $table->string('gedung', 50);
            $table->unsignedTinyInteger('lantai');
            $table->unsignedSmallInteger('kapasitas');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ruangan');
    }
};
