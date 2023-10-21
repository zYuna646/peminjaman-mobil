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
        Schema::create('peminjaman_mobils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('mobil_id'); 
            $table->enum('status', ['ditolak', 'diterima', 'diproses'])->default('diproses');
            $table->dateTime('awal_peminjaman');
            $table->dateTime('akhir_peminjaman');
            $table->string('perihal');
            $table->string('surat_LDP');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('mobil_id')->references('id')->on('mobils');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_mobil');
    }
};
