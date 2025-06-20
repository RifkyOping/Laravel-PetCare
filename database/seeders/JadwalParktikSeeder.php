<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JadwalParktik;
use Illuminate\Support\Facades\DB;

class JadwalParktikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwal_praktik')->insert([
            [
                'dokter_id' => 1,
                'hari' => 'setiap hari',
            ],
        ]);
    }
}
