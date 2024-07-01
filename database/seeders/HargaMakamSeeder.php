<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HargaMakamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('harga_makam')->insert([

            [
                'id_harga' => 'HR001',
                'id_blok' => 'BL001',
                'harga_makam' => 10000000,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
