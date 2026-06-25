<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hewan;
use App\Models\JanjiTemu;
use App\Models\Dokter;
use App\Models\Klien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Dashboard extends Controller
{
    public function dash()
    {
        $user = Auth::user();
        $role = $user->role;

        $stats = [];

        if ($role === 'admin') {
            $stats['totalDokter'] = Cache::remember('admin_totalDokter', 60, fn() => Dokter::count());
            $stats['totalKlien'] = Cache::remember('admin_totalKlien', 60, fn() => Klien::count());
            $stats['totalHewan'] = Cache::remember('admin_totalHewan', 60, fn() => Hewan::count());
            $stats['totalJanji'] = Cache::remember('admin_totalJanji', 60, fn() => JanjiTemu::count());
            $stats['recentJanji'] = Cache::remember('admin_recentJanji', 60, fn() => JanjiTemu::with(['klien', 'dokter', 'hewan'])->latest()->take(5)->get());
        } elseif ($role === 'dokter') {
            $dokter = Cache::remember("dokter_user_{$user->id}", 60, fn() => Dokter::where('pengguna_id', $user->id)->first());
            if ($dokter) {
                $stats['totalPasien'] = Cache::remember("dokter_{$dokter->id}_totalPasien", 60, fn() => JanjiTemu::where('dokter_id', $dokter->id)->distinct('hewan_id')->count('hewan_id'));
                $stats['totalJanji'] = Cache::remember("dokter_{$dokter->id}_totalJanji", 60, fn() => JanjiTemu::where('dokter_id', $dokter->id)->count());
                $stats['janjiMenunggu'] = Cache::remember("dokter_{$dokter->id}_janjiMenunggu", 60, fn() => JanjiTemu::where('dokter_id', $dokter->id)->where('status', 'menunggu')->count());
                $stats['recentJanji'] = Cache::remember("dokter_{$dokter->id}_recentJanji", 60, fn() => JanjiTemu::with(['klien', 'hewan'])->where('dokter_id', $dokter->id)->latest()->take(5)->get());
            }
        } elseif ($role === 'klien') {
            $klien = Cache::remember("klien_user_{$user->id}", 60, fn() => $user->klien);
            if ($klien) {
                $stats['totalHewan'] = Cache::remember("klien_{$klien->id}_totalHewan", 60, fn() => Hewan::where('klien_id', $klien->id)->count());
                $stats['totalJanji'] = Cache::remember("klien_{$klien->id}_totalJanji", 60, fn() => JanjiTemu::where('klien_id', $klien->id)->count());
                $stats['janjiAktif'] = Cache::remember("klien_{$klien->id}_janjiAktif", 60, fn() => JanjiTemu::where('klien_id', $klien->id)->whereIn('status', ['menunggu', 'dijadwalkan'])->count());
            }
        }

        return view('dashboard', compact('stats', 'role'));
    }
}
