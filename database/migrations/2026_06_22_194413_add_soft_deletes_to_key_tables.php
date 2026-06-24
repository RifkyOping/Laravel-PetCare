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
        Schema::table('dokter', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('klien', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('hewan', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('janji_temu', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('dokter', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('klien', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('hewan', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('janji_temu', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
