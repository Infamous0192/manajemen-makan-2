<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenazahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenazah')->insert([
            
            [
                'id_jenazah' => 'JZ001',
                'nama' => 'John Doe',
                'nik' => '1234567890123456',
                'tempat_lahir' => 'City A',
                'tanggal_lahir' => '1980-01-01',
                'jenis_kelamin' => 'L',
                'status_kawin' => 'Kawin',
                'kewarganegaraan' => 'Indonesia',
                'provinsi' => 'Province A',
                'kabupaten' => 'Kabupaten A',
                'kecamatan' => 'Kecamatan A',
                'kelurahan' => 'Kelurahan A',
                'rt' => 1,
                'rw' => 1,
                'alamat_lengkap' => 'Address A',
                'alamat_singkat' => 'Address A',
                'agama' => 'Islam',
                'pendidikan' => 'S1',
                'pekerjaan' => 'Engineer',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        
        ]);
    }
}
