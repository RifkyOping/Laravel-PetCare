<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $table = 'pengguna';
    protected $fillable = ['email', 'password', 'role', 'photo_profile'];

    public function dokter()
    {
        return $this->hasOne(Dokter::class);
    }

    public function klien()
    {
        return $this->hasOne(Klien::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
