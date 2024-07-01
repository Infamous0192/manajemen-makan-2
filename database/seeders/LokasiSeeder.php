<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lokasi')->insert([

            [
                'id_lokasi' => 'LK001',
                'id_blok' => 'BL001',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
