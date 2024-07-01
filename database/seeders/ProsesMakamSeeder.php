<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProsesMakamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proses_makam')->insert([

            [
                'id_pemakaman' => 'PM001',
                'id_jenazah' => 'JZ001',
                'id_lokasi' => 'LK001',
                'id_biaya' => 'BY001',
                'id_pekerja' => 'PK001',
                'tanggal_pemakaman' => '2024-01-03',
                'jumlah_pekerja' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
