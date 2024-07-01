<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blok')->insert([

            [
                'id_blok' => 'BL001',
                'nama_blok' => 'Blok A',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
