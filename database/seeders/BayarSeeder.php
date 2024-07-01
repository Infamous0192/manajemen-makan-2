<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BayarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bayar')->insert([

            [
                'id_bayar' => 'BY001',
                'id_daftar' => 'DF001',
                'id_jenazah' => 'JZ001',
                'id_lokasi' => 'LK001',
                'id_biaya' => 'BY001',
                'id_harga' => 'HR001',
                'tanggal_bayar' => '2024-01-02',
                'jenis_bayar' => 'cash',
                'jumlah' => 5000000,
                'status' => 'terbayar',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
