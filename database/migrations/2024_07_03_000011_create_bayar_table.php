<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar', function (Blueprint $table) {

            $table->string('id_bayar', 10)->primary();
            $table->string('id_daftar', 10);
            $table->string('id_jenazah', 10);
            $table->string('id_lokasi', 10);
            $table->string('id_biaya', 10);
            $table->string('id_harga', 10);
            $table->date('tanggal_bayar');
            $table->enum('jenis_bayar', ['cash', 'transfer']);
            $table->integer('jumlah');
            $table->enum('status', ['terbayar', 'belum']);
            $table->string('bukti_transfer')->nullable(); // New column for file upload
            $table->foreign('id_daftar')->references('id_daftar')->on('daftar')->cascadeOnDelete();
            $table->foreign('id_jenazah')->references('id_jenazah')->on('jenazah')->cascadeOnDelete();
            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi')->cascadeOnDelete();
            $table->foreign('id_biaya')->references('id_biaya')->on('biaya')->cascadeOnDelete();
            $table->foreign('id_harga')->references('id_harga')->on('harga_makam')->cascadeOnDelete();

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
        Schema::dropIfExists('bayar');
    }
}
