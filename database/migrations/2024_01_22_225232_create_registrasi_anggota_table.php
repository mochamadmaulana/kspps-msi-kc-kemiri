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
            $table->foreignId('anggota_id');
            $table->foreignId('inputer_id');
            $table->enum('status',['Diajukan','Diproses','Ditolak','Diterima','Diajukan Ulang'])->default('Diajukan');
            $table->enum('metode_bayar',['Cash','Transfer']);
            $table->double('biaya');
            $table->enum('persetujuan_admin',['Diproses','Diterima','Ditolak'])->default('Diproses');
            $table->enum('persetujuan_branch_manager',['Diproses','Diterima','Ditolak'])->default('Diproses');
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
