<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar', function (Blueprint $table) {

            $table->string('id_daftar', 10)->primary();
            $table->string('nama', 50);
            $table->string('no_hp', 12);
            $table->date('tanggal_meninggal');
            $table->string('id_jenazah', 10);
            $table->foreign('id_jenazah')->references('id_jenazah')->on('jenazah')->cascadeOnDelete();

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
        Schema::dropIfExists('daftar');
    }
}
