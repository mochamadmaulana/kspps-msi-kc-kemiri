<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usaha_pasangan_anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasangan_anggota_id');
            $table->foreignId('jenis_usaha_id');
            $table->foreignId('komoditi_usaha_id');
            $table->string('deskripsi')->nullable();
            $table->double('pendapatan_perbulan');
            $table->string('alamat');
            $table->foreignId('provinsi_id');
            $table->foreignId('kota_id');
            $table->foreignId('kecamatan_id');
            $table->foreignId('kelurahan_id');
            $table->string('rt',3)->nullable();
            $table->string('rw',3)->nullable();
            $table->string('kode_pos',5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usaha_pasangan_anggota');
    }
};
