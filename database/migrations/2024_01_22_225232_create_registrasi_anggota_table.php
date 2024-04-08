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
        Schema::create('registrasi_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_registrasi',20);
            $table->foreignId('kantor_id');
            $table->foreignId('karyawan_id');
            $table->enum('status',['Draft','Diajukan','Diproses','Ditolak','Diterima','Diajukan Ulang'])->default('Draft');
            $table->enum('persetujuan_admin',['Proses','Diterima','Ditolak'])->default('Proses');
            $table->enum('persetujuan_branch_manager',['Proses','Diterima','Ditolak'])->default('Proses');
            $table->enum('metode_bayar',['Cash','Transfer'])->nullable();
            $table->double('biaya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_anggota');
    }
};
