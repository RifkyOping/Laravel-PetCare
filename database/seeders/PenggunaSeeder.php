<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('pengguna')->insert([
            [
                'email' => 'klien@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'klien',
            ],
            [
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
            ],
            [
                'email' => 'dokter@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'dokter',
            ],
            [
                'email' => 'dokter2@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'dokter',
            ],
        ]);
    }
}
