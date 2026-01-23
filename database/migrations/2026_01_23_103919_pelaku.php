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
        schema::create('pelaku', function (Blueprint $table) {
            $table->id('id_pelaku');
            $table->string('nama');
            $table->string('jabatan');
            $table->unsignedBigInteger('id_aduan');
            $table->unsignedBigInteger('id_unit');
            $table->timestamps();

            $table->foreign('id_aduan')->references('id_aduan')->on('aduan')->onDelete('cascade');
            $table->foreign('id_unit')->references('id_unit')->on('odp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaku');
    }
};
