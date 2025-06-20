<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KlienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('klien')->insert([
            [
                'pengguna_id' => 1,
                'nama' => 'Klien',
                'no_telepon' => '085241175690',
                'alamat' => 'Kalukku',
            ],
        ]);

    }
}
