<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Hewan;
use App\Models\JanjiTemu;
use App\Models\JadwalPraktik;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function data()
    {
        $data = Dokter::with('pengguna')->get();
        return view('Data.dataDokter', compact('data'));
    }

    public function jadwalJanji()
    {
        JanjiTemu::updateExpiredStatus();
        $dokter = Dokter::where('pengguna_id', Auth::id())->first();
        if ($dokter) {
            $data = JanjiTemu::with(['klien', 'hewan'])->where('dokter_id', $dokter->id)->get();
        } else {
            $data = collect();
        }
        return view('Dokter.jadwalJanji', compact('data'));
    }

    public function daftarPasien()
    {
        $dokter = Dokter::where('pengguna_id', Auth::id())->first();
        if ($dokter) {
            $hewanIds = JanjiTemu::where('dokter_id', $dokter->id)->pluck('hewan_id')->unique();
            $data = Hewan::with('klien.pengguna')->whereIn('id', $hewanIds)->get();
        } else {
            $data = collect();
        }
        return view('Dokter.daftarPasien', compact('data'));
    }

    public function setujuiJanji($id)
    {
        $janji = JanjiTemu::findOrFail($id);
        $janji->update(['status' => 'dijadwalkan']);
        return redirect()->back()->with('success', 'Janji temu berhasil disetujui (dijadwalkan).');
    }

    public function show($id)
    {
        $data = Dokter::with('jadwalPraktik')->findOrFail($id);
        return view('Data.detailDokter', compact('data'));
    }
}
