<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PekerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pekerja')->insert([

            [
                'id_pekerja' => 'PK001',
                'nama' => 'Worker A',
                'tempat_lahir' => 'City B',
                'tanggal_lahir' => '1985-02-02',
                'jenis_kelamin' => 'L',
                'alamat' => 'Address B',
                'no_hp' => '081234567891',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
