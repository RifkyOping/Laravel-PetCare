<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hewan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'hewan';
    protected $fillable = ['klien_id', 'nama', 'jenis', 'tanggal_lahir', 'jenis_kelamin', 'foto_profil'];

    public function getUmurAttribute()
    {
        if (!$this->tanggal_lahir) {
            return '-';
        }
        $diff = \Carbon\Carbon::parse($this->tanggal_lahir)->diff(\Carbon\Carbon::now());
        if ($diff->y > 0) {
            return $diff->y . ' Tahun ' . $diff->m . ' Bulan';
        } elseif ($diff->m > 0) {
            return $diff->m . ' Bulan ' . $diff->d . ' Hari';
        } else {
            return $diff->d . ' Hari';
        }
    }

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    public function janjiTemu()
    {
        return $this->hasMany(JanjiTemu::class);
    }

}
