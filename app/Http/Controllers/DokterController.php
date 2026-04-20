<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\JadwalPraktik;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function data()
    {
        $data = Dokter::with('pengguna')->get();
        return view('Data.dataDokter', compact('data'));
    }

    public function jadwalJanji()
    {
        \App\Models\JanjiTemu::updateExpiredStatus();
        $dokter = Dokter::where('pengguna_id', Auth::id())->first();
        if ($dokter) {
            $data = \App\Models\JanjiTemu::with(['klien', 'hewan'])->where('dokter_id', $dokter->id)->get();
        } else {
            $data = collect();
        }
        return view('Dokter.jadwalJanji', compact('data'));
    }

    public function daftarPasien()
    {
        $dokter = Dokter::where('pengguna_id', Auth::id())->first();
        if ($dokter) {
            $hewanIds = \App\Models\JanjiTemu::where('dokter_id', $dokter->id)->pluck('hewan_id')->unique();
            $data = \App\Models\Hewan::with('klien.pengguna')->whereIn('id', $hewanIds)->get();
        } else {
            $data = collect();
        }
        return view('Dokter.daftarPasien', compact('data'));
    }


    public function setujuiJanji($id)
    {
        $janji = \App\Models\JanjiTemu::findOrFail($id);
        $janji->update(['status' => 'dijadwalkan']);
        return redirect()->back()->with('success', 'Janji temu berhasil disetujui (dijadwalkan).');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Dokter::with('jadwalPraktik')->findOrFail($id);
        return view('Data.detailDokter', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
