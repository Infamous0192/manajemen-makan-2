<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_bulanan', function (Blueprint $table) {
            $table->string('id_rawat')->primary();
            $table->string('nama_jenazah');
            $table->string('id_lokasi');
            $table->string('id_blok');
            $table->string('status');
            $table->string('bukti_transfer')->nullable(); // New column for file upload

            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi')->cascadeOnDelete();
            $table->foreign('id_blok')->references('id_blok')->on('blok')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rawat_bulanan');
    }
};
