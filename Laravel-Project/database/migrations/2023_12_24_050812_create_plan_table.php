<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Enable', 'Disable']);
            $table->string('namapaket');
            $table->string('namabandwith');
            $table->unsignedBigInteger('harga');
            $table->unsignedInteger('masa_aktif');
            $table->enum('masa_aktif_unit', ['menit', 'jam', 'hari', 'bulan']); // Menambahkan kolom untuk unit masa aktif
            $table->string('nama_router');
            $table->string('ippol');
            $table->timestamps();
        });
    }

    /**
     * Membatalkan migrasi.
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
