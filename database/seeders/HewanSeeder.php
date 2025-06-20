<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hewan;
use Illuminate\Support\Facades\DB;

class HewanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('hewan')->insert([
            [
                'klien_id' => 1,
                'nama' => 'Boy',
                'jenis' => 'Kucing',
                'umur' => 5,
                'jenis_kelamin' => 'jantan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'klien_id' => 1,
                'nama' => 'Kiw',
                'jenis' => 'Anjeng',
                'umur' => 5,
                'jenis_kelamin' => 'Betina',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
