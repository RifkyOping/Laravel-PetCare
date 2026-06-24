<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JanjiTemu extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'janji_temu';
    protected $fillable = ['klien_id', 'dokter_id', 'hewan_id', 'tanggal_janji', 'resep', 'status'];

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

    public static function updateExpiredStatus()
    {
        self::where('tanggal_janji', '<', now())
            ->whereIn('status', ['menunggu', 'dijadwalkan'])
            ->update(['status' => 'selesai']);
    }
}

