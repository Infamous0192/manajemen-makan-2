<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHargaMakamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_makam', function (Blueprint $table) {

            $table->string('id_harga', 10)->primary();
            $table->string('id_blok', 10);
            $table->integer('harga_makam');
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
        Schema::dropIfExists('harga_makam');
    }
}
