<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalPraktikSeeder extends Seeder
{
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
