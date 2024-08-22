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
        Schema::create('kompetisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('lokasi');
            $table->text('deskripsi')->nullable();
            $table->date('buka_pendaftaran');
            $table->date('tutup_pendaftaran');
            $table->enum('kategori', ['Resmi','Fun'])->default('Fun');
            $table->date('waktu_techmeeting')->nullable();
            $table->date('waktu_kompetisi');
            $table->string('file_hasil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kompetisi');
    }
};
