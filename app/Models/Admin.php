<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $fillable = ['nama', 'no_telepon', 'alamat'];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }
}
