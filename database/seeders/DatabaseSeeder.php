<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\JadwalParktik;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            PenggunaSeeder::class,
            DokterSeeder::class,
            JanjiTemuSeeder::class,
            RekamMedisSeeder::class,
            JadwalParktikSeeder::class,
            KlienSeeder::class,
            HewanSeeder::class,
            AdminSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
