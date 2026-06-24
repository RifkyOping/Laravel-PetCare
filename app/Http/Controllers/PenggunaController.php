<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PenggunaController extends Controller
{
    public function show()
    {
        $pengguna = Auth::user();
        return view('Profil.profil', compact('pengguna'));
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
            'photo_profile' => 'nullable|string',
        ]);

        // 2. Proses Foto Profil
        $photoPath = null;

        Log::info('photo_profile filled: ' . ($request->filled('photo_profile') ? 'YES' : 'NO'));
        Log::info('photo_profile length: ' . strlen($request->input('photo_profile', '')));

        if ($request->filled('photo_profile')) {
            // Hapus foto lama jika ada
            if ($pengguna->photo_profile && Storage::disk('public')->exists($pengguna->photo_profile)) {
                Storage::disk('public')->delete($pengguna->photo_profile);
                Log::info('Deleted old photo: ' . $pengguna->photo_profile);
            }

            // Decode base64 dari cropper dan simpan sebagai file
            $imageData = $request->photo_profile;
            $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $decoded = base64_decode($imageData);

            Log::info('Decoded size: ' . strlen($decoded) . ' bytes');

            if ($decoded) {
                $fileName = 'profile_photos/' . Str::random(40) . '.jpg';
                Storage::disk('public')->put($fileName, $decoded);
                $photoPath = $fileName;
                Log::info('Saved photo to: ' . $photoPath);
            }
        }

        // 3. Update Email (dan Foto) pada tabel pengguna utama
        $penggunaData = ['email' => $request->email];
        
        if ($photoPath) {
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

        } elseif ($pengguna->role === 'admin') {
            if ($pengguna->admin) {
                $pengguna->admin->update([
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'no_telepon' => $request->no_telepon,
                ]);
            }
        }

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui');
    }
}