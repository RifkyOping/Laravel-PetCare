<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pengguna;
use App\Models\Hewan;
use App\Models\Klien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    

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
    public function show()
    {
        $pengguna = Auth::user();
        $dokter = Pengguna::with('dokter.jadwalPraktik')->find(Auth::id());
        return view('Profil.profil', compact('pengguna', 'dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $pengguna = Auth::user();
        return view('Profil.editProfil', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pengguna = Auth::user();

        if ($pengguna->role === 'klien') {
            $pengguna->klien->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
            ]);
        } elseif ($pengguna->role === 'dokter') {
            $pengguna->dokter->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'spesialisasi' => $request->spesialisasi,
            ]);

            $jadwal = $pengguna->dokter->jadwalPraktik->first();
            if ($jadwal) {
                $jadwal->update(['hari' => $request->hari]);
            }
        }

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
