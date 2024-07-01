<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('biaya')->insert([

            [
                'id_biaya' => 'BY001',
                'nama_pekerjaan' => 'Pekerjaan A',
                'nama_paket' => 'Paket A',
                'jumlah_pekerja' => 10,
                'fasilitas' => 'Fasilitas A',
                'harga' => 5000000,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
