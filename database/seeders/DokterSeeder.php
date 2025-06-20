<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dokter;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dokter')->insert([
            [
                'pengguna_id' => 3,
                'nama' => 'Dokter',
                'alamat' => 'Kalukku',
                'no_telepon' => '085241175690',
                'spesialisasi' => 'Anjing, Kucing',
            ],
            [
                'pengguna_id' => 4,
                'nama' => 'Dokter 2',
                'alamat' => 'Mamuju',
                'no_telepon' => '085241175690',
                'spesialisasi' => 'umum',
            ],
        ]);
    }
}
