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
        Schema::create('pasangan_anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id');
            $table->enum('jenis_identitas',['KTP','SIM']);
            $table->string('nomor_identitas',17)->unique();
            $table->string('nama_lengkap');
            $table->string('nomor_telepone');
            $table->foreignId('tempat_lahir_id');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->enum('agama',['Islam','Hindu','Budha','Katolik','Protestan','Khonghucu']);
            $table->enum('pendidikan_terakhir',['Tidak Bersekolah', 'SD', 'SMP', 'SMA', 'Diploma 3', 'Sarjana 1', 'Sarjana 2', 'Sarjana 3']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasangan_anggota');
    }
};
