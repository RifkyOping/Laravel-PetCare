<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JanjiTemu extends Model
{
    /** @use HasFactory<\Database\Factories\JanjiTemuFactory> */
    use HasFactory;
    protected $table = 'janji_temu';
    protected $fillable = ['klien_id', 'dokter_id', 'hewan_id', 'tanggal_janji', 'resep'];

    public function klien()
        {
            return $this->belongsTo(Klien::class);
        }

        // Relasi ke dokter
        public function dokter()
        {
            return $this->belongsTo(Dokter::class);
        }

        // Relasi ke hewan
        public function hewan()
        {
            return $this->belongsTo(Hewan::class);
        }
}

