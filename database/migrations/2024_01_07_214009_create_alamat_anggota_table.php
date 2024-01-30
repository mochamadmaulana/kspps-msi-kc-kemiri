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
        Schema::create('alamat_anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id');
            $table->enum('jenis',['Identitas','Domisili']);
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
        Schema::dropIfExists('alamat_anggota');
    }
};
