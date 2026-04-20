<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Hewan;
use App\Models\JanjiTemu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KlienController extends Controller
{
    public function index()
    {
        \App\Models\JanjiTemu::updateExpiredStatus();
        $klien = Auth::user()->klien;
        $data = JanjiTemu::with(['klien', 'dokter', 'hewan'])->where('klien_id', $klien->id)->get();

        return view('Janji-Temu.lihatJanji', compact('data'));
    }

    public function create($dokterId)
    {
        $dokter = Dokter::findOrFail($dokterId);
        $klien = Auth::user()->klien;
        $hewan = Hewan::where('klien_id', $klien->id)->get();

        return view('Janji-Temu.buatJanji', compact('dokter', 'hewan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokter,id',
            'hewan_id' => 'required|exists:hewan,id',
            'tanggal_janji' => 'required|date|after:now',
        ]);

        $klien = Auth::user()->klien;

        JanjiTemu::create([
            'klien_id' => $klien->id,
            'dokter_id' => $request->dokter_id,
            'hewan_id' => $request->hewan_id,
            'tanggal_janji' => $request->tanggal_janji,
            'status' => 'menunggu',
        ]);

        return redirect()->route('janji.lihat')->with('success', 'Janji temu berhasil dibuat.');
    }
}
