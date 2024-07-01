<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gaji')->insert([
            
            [
                'id_gaji' => 'GJ001',
                'id_pekerja' => 'PK001',
                'bulan_gaji' => '2024-01-01',
                'tanggal_gaji' => '2024-01-31',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        
        ]);
    }
}
