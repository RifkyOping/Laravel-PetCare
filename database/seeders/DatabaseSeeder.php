<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PenggunaSeeder::class,
            DokterSeeder::class,
            JanjiTemuSeeder::class,
            RekamMedisSeeder::class,
            JadwalPraktikSeeder::class,
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
