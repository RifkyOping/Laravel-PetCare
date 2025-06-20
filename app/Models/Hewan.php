<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    /** @use HasFactory<\Database\Factories\HewanFactory> */
    use HasFactory;
    protected $table = 'hewan';
    protected $fillable = ['klien_id', 'nama', 'jenis', 'umur', 'jenis_kelamin'];

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    public function janjiTemu()
    {
        return $this->hasMany(JanjiTemu::class);
    }

}
