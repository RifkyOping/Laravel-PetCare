<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'klien';
    protected $fillable = ['pengguna_id', 'nama', 'no_telepon', 'alamat'];

    public function peliharaan()
    {
        return $this->hasMany(Hewan::class);
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
