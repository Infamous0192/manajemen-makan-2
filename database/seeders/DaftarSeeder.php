<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daftar')->insert([

            [
                'id_daftar' => 'DF001',
                'nama' => 'Jane Doe',
                'no_hp' => '081234567890',
                'tanggal_meninggal' => '2024-01-01',
                'id_jenazah' => 'JZ001',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
