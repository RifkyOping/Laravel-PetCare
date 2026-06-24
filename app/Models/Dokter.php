<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\JadwalPraktik;

class Dokter extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'dokter';
    protected $fillable = ['pengguna_id', 'nama', 'alamat', 'no_telepon', 'spesialisasi'];

    public function jadwalPraktik()
    {
        return $this->hasMany(JadwalPraktik::class);
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function janjiTemu()
    {
        return $this->hasMany(JanjiTemu::class);
    }

}
