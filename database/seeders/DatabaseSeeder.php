<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            PekerjaSeeder::class,
            GajiSeeder::class,
            JenazahSeeder::class,
            BlokSeeder::class,
            HargaMakamSeeder::class,
            LokasiSeeder::class,
            DaftarSeeder::class,
            BiayaSeeder::class,
            RawatSeeder::class,
            ProsesMakamSeeder::class,
            BayarSeeder::class,
        ]);
    }
}
