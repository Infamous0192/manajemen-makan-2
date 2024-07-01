<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {

            $table->string('id_gaji', 10)->primary();
            $table->string('id_pekerja', 10);
            $table->date('bulan_gaji');
            $table->date('tanggal_gaji');
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
        Schema::dropIfExists('gaji');
    }
}
