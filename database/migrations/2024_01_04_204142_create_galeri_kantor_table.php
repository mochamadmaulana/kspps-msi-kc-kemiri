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
        Schema::create('galeri_kantor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kantor_id');
            $table->string('hash');
            $table->string('original');
            $table->double('size');
            $table->string('extention',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri_kantor');
    }
};
