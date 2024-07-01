<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RawatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rawat')->insert([

            [
                'id_rawat' => 'RW001',
                'id_lokasi' => 'LK001',
                'id_jenazah' => 'JZ001',
                'id_pekerja' => 'PK001',
                'jumlah_pekerja' => 5,
                'jumlah_perawatan' => 3,
                'tanggal_rawat' => '2024-01-04',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
