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
        Schema::create('hewan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klien_id')->constrained('klien')->onDelete('cascade');
            $table->String('nama');
            $table->String('jenis');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['jantan', 'betina']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hewan');
    }
};
