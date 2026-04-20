<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pengguna;
use App\Models\Hewan;
use App\Models\Klien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Ditambahkan untuk mengelola file storage

class PenggunaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    // public function create() { ... }

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

        // 1. Validasi Input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pengguna,email,' . $pengguna->id,
            'alamat' => 'required|string',
            'no_telepon' => 'required|string',
            'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Proses Upload Foto Profil Baru
        $photoPath = null;
        if ($request->hasFile('photo_profile')) {
            $photoPath = $request->file('photo_profile')->store('profile_photos', 'public');
        }

        // 3. Update Email (dan Foto) pada tabel pengguna utama
        $penggunaData = ['email' => $request->email];
        
        if ($photoPath) {
            // Hapus foto lama di tabel pengguna jika ada
            if ($pengguna->photo_profile && Storage::disk('public')->exists($pengguna->photo_profile)) {
                Storage::disk('public')->delete($pengguna->photo_profile);
            }
            $penggunaData['photo_profile'] = $photoPath;
        }
        
        $pengguna->update($penggunaData);

        // 4. Update data spesifik berdasarkan Role (TIDAK TERMASUK FOTO)
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