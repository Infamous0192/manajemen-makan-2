<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenazahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenazah', function (Blueprint $table) {

            $table->string('id_jenazah', 10)->primary();
            $table->string('nama', 50);
            $table->string('nik', 16);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('status_kawin', ['Kawin', 'Belum Kawin']);
            $table->string('kewarganegaraan', 50);
            $table->string('provinsi', 50);
            $table->string('kabupaten', 50);
            $table->string('kecamatan', 50);
            $table->string('kelurahan', 50);
            $table->integer('rt');
            $table->integer('rw');
            $table->text('alamat_lengkap');
            $table->text('alamat_singkat');
            $table->enum('agama', ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Buddha', 'Konghucu']);
            $table->string('pendidikan', 50);
            $table->string('pekerjaan', 50);

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
        Schema::dropIfExists('jenazah');
    }
}
