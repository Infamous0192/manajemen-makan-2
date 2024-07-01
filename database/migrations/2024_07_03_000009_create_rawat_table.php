<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat', function (Blueprint $table) {

            $table->string('id_rawat', 10)->primary();
            $table->string('id_lokasi', 10);
            $table->string('id_jenazah', 10);
            $table->string('id_pekerja', 10);
            $table->integer('jumlah_pekerja');
            $table->integer('jumlah_perawatan');
            $table->date('tanggal_rawat');
            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi')->cascadeOnDelete();
            $table->foreign('id_jenazah')->references('id_jenazah')->on('jenazah')->cascadeOnDelete();
            $table->foreign('id_pekerja')->references('id_pekerja')->on('pekerja')->cascadeOnDelete();

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
        Schema::dropIfExists('rawat');
    }
}
