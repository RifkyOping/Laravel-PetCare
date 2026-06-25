<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jadwal_praktik', function (Blueprint $table) {
            if (\Illuminate\Support\Facades\DB::getDriverName() === 'pgsql') {
                \Illuminate\Support\Facades\DB::statement('ALTER TABLE jadwal_praktik ALTER COLUMN hari TYPE VARCHAR(255)');
            } else {
                \Illuminate\Support\Facades\DB::statement('ALTER TABLE jadwal_praktik MODIFY hari VARCHAR(255)');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_praktik', function (Blueprint $table) {
            if (\Illuminate\Support\Facades\DB::getDriverName() === 'pgsql') {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE jadwal_praktik ALTER COLUMN hari TYPE VARCHAR(255)"); // Reverting to enum in pgsql requires custom types, keeping as varchar is safer
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE jadwal_praktik MODIFY hari ENUM('senin - jumat', 'setiap hari')");
            }
        });
    }
};
