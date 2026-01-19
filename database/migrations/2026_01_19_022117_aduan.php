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
        Schema::create('aduan', function (Blueprint $table) {
            $table->id('id_aduan');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_unit');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_kasus');
            $table->text('kronologi');
            $table->string('nama_pengadu');
            $table->string('subjek_pelaku');
            $table->dateTime('waktu_kejadian');
            $table->string('status_aduan')->default('sedang diproses');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori_aduan')->onDelete('cascade');
            $table->foreign('id_unit')->references('id_unit')->on('odp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduan');
    }
};
