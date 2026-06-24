<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hewan;
use App\Models\JanjiTemu;
use App\Models\Dokter;
use App\Models\Klien;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function dash()
    {
        $user = Auth::user();
        $role = $user->role;

        $stats = [];

        if ($role === 'admin') {
            $stats['totalDokter'] = Dokter::count();
            $stats['totalKlien'] = Klien::count();
            $stats['totalHewan'] = Hewan::count();
            $stats['totalJanji'] = JanjiTemu::count();
        } elseif ($role === 'dokter') {
            $dokter = Dokter::where('pengguna_id', $user->id)->first();
            if ($dokter) {
                $stats['totalPasien'] = JanjiTemu::where('dokter_id', $dokter->id)->distinct('hewan_id')->count('hewan_id');
                $stats['totalJanji'] = JanjiTemu::where('dokter_id', $dokter->id)->count();
                $stats['janjiMenunggu'] = JanjiTemu::where('dokter_id', $dokter->id)->where('status', 'menunggu')->count();
            }
        } elseif ($role === 'klien') {
            $klien = $user->klien;
            if ($klien) {
                $stats['totalHewan'] = Hewan::where('klien_id', $klien->id)->count();
                $stats['totalJanji'] = JanjiTemu::where('klien_id', $klien->id)->count();
                $stats['janjiAktif'] = JanjiTemu::where('klien_id', $klien->id)->whereIn('status', ['menunggu', 'dijadwalkan'])->count();
            }
        }

        return view('dashboard', compact('stats', 'role'));
    }
}
