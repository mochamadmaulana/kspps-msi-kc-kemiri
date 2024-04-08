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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('uuid',50);
            $table->string('nomor_induk_karyawan',7)->unique();
            $table->foreignId('kantor_id');
            $table->string('nama_lengkap',150);
            $table->enum('role',['Super Admin','Admin','Asmen Keuangan','Asmen Pembiayaan','Staff Lapangan','Branch Manager'])->default('Staff Lapangan');
            $table->string('email',150)->unique()->nullable();
            $table->foreignId('tempat_lahir_id');
            $table->date('tanggal_lahir');
            $table->enum('status',['Tidak Aktif','Aktif','Dibekukan','Keluar'])->default('Aktif');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('foto_profile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
