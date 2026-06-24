<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Hewan;
use App\Models\JanjiTemu;
use App\Http\Requests\StoreJanjiTemuRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KlienController extends Controller
{
    public function index()
    {
        JanjiTemu::updateExpiredStatus();
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

    public function store(StoreJanjiTemuRequest $request)
    {
        $request->validated();

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
