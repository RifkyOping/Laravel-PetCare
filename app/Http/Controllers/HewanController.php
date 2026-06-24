<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hewan;
use App\Models\Klien;
use App\Http\Requests\StoreHewanRequest;
use App\Http\Requests\UpdateHewanRequest;

class HewanController extends Controller
{

    public function detail($id)
    {
        $detailHewan = Hewan::findOrFail($id);
        return view('Hewan.detailHewan', compact('detailHewan'));
    }

    public function filterByJenis($jenis)
    {
        $hewan = Hewan::where('jenis', $jenis)->get();
        return view('Hewan.hewan', compact('hewan', 'jenis'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
                $user = Auth::user();

    // Jika admin, kirim semua klien untuk pilihan
    $daftarKlien = [];
    if ($user->role === 'admin') {
        $daftarKlien = Klien::with('pengguna')->get(); // opsional: with pengguna
    }

    return view('Hewan.tambahHewan', [
        'daftarKlien' => $daftarKlien,
        'role' => $user->role
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHewanRequest $request)
    {
        $request->validated();

        if (Auth::user()->role === 'admin') {
            $klien_id = $request->klien_id;
        } else {
            $klien = Klien::where('pengguna_id', Auth::id())->first();
            $klien_id = $klien->id ?? null;
        }

        $photoPath = null;
        if ($request->filled('foto_profil')) {
            $imageData = $request->foto_profil;
            $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $decoded = base64_decode($imageData);

            if ($decoded) {
                $fileName = 'hewan_photos/' . \Illuminate\Support\Str::random(40) . '.jpg';
                \Illuminate\Support\Facades\Storage::disk('public')->put($fileName, $decoded);
                $photoPath = $fileName;
            }
        }

        Hewan::create([
            'klien_id' => $klien_id,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto_profil' => $photoPath,
        ]);

        $jenis = strtolower($request->jenis);

        if (Auth::user()->role === 'klien') {
            return redirect()->route('hewan.jenis', $jenis)->with('success', 'Data hewan berhasil disimpan.');
        }elseif (Auth::user()->role === 'admin') {
            return redirect()->route('admin.hewan.index')->with('success', 'Data hewan berhasil disimpan.');
        }elseif (Auth::user()->role === 'dokter') {
            return redirect()->route('dokter.pasien')->with('success', 'Data hewan berhasil ditambahkan.');
        }
    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataHewan = Hewan::findOrFail($id);

        return view('Hewan.editHewan', compact('dataHewan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHewanRequest $request, string $id)
    {
        $request->validated();

        $hewan = Hewan::findOrFail($id);
        
        $updateData = [
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ];

        if ($request->filled('foto_profil')) {
            // Hapus foto lama jika ada
            if ($hewan->foto_profil && \Illuminate\Support\Facades\Storage::disk('public')->exists($hewan->foto_profil)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($hewan->foto_profil);
            }

            $imageData = $request->foto_profil;
            $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $decoded = base64_decode($imageData);

            if ($decoded) {
                $fileName = 'hewan_photos/' . \Illuminate\Support\Str::random(40) . '.jpg';
                \Illuminate\Support\Facades\Storage::disk('public')->put($fileName, $decoded);
                $updateData['foto_profil'] = $fileName;
            }
        }

        $hewan->update($updateData);

        if (Auth::user()->role === 'klien') {
            return redirect()->route('hewan.show', ['id' => $hewan->id])->with('success', 'Data hewan berhasil diperbarui.');
        }elseif (Auth::user()->role === 'admin') {
            return redirect()->route('admin.hewan.index')->with('success', 'Data hewan berhasil diperbarui.');
        }elseif (Auth::user()->role === 'dokter') {
            return redirect()->route('hewan.show', ['id' => $hewan->id])->with('success', 'Data hewan berhasil diperbarui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($jenis, $id)
    {
        $hewan = Hewan::findOrFail($id);
        $hewan->delete();

        if (Auth::user()->role === 'klien') {
            return redirect()->route('hewan.jenis', $jenis)->with('success', 'Data hewan berhasil dihapus.');
        }elseif (Auth::user()->role === 'dokter') {
            return redirect()->route('dokter.pasien')->with('success', 'Data hewan berhasil dihapus.');
        }
        
        return redirect()->route('admin.hewan.index')->with('success', 'Data hewan berhasil dihapus.');
    }

}
