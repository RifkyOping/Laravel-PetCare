<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Hewan;
use App\Models\JadwalPraktik;
use App\Models\JanjiTemu;
use App\Models\Klien;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dokter()
    {
        // $pengguna = Pengguna::with('dokter')->get();
        $pengguna = Pengguna::where('role', 'dokter')->with('dokter')->paginate(10);

        return view('Admin.Dokter.kelolaDokter', compact('pengguna'));
    }

    public function editDokter($id)
    {
        $dataDokter = Pengguna::with('dokter')->findOrFail($id);

        if (!$dataDokter->dokter) {
            abort(404, 'Data dokter tidak ditemukan.');
        }

        return view('Admin.Dokter.editDokter', compact('dataDokter'));
    }

    public function simpanDokter(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:100',
            'hari' => 'required|string|max:100',
        ]);

        // Ambil pengguna berdasarkan ID
        $pengguna = Pengguna::with('dokter.jadwalPraktik')->findOrFail($id);

        // Update tabel `users`
        $pengguna->email = $request->email;
        $pengguna->save();

        // Update tabel `dokter`
        if ($pengguna->dokter) {
            $pengguna->dokter->update([
                'nama' => $request->nama,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
                'spesialisasi' => $request->spesialisasi,
            ]);
        }

        // Update atau buat jadwal praktik (one-to-many, ambil yg pertama)
        if ($pengguna->dokter && $pengguna->dokter->jadwalPraktik->first()) {
            $pengguna->dokter->jadwalPraktik->first()->update([
                'hari' => $request->hari,
            ]);
        } else {
            // Jika belum ada jadwal praktik, buat baru
            JadwalPraktik::create([
                'dokter_id' => $pengguna->dokter->id,
                'hari' => $request->hari,
            ]);
        }

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function tambahDokter(Request $request)
    {
        $jadwal = JadwalPraktik::select('hari')->distinct()->get();
        return view('Admin.Dokter.tambahDokter', compact('jadwal'));
    }

    public function tambahkanDokter(Request $request)
    {
        $pengguna = Pengguna::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'dokter',
        ]);

        $dokter = Dokter::create([
            'pengguna_id' => $pengguna->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon ?? '',
            'spesialisasi' => $request->spesialisasi ?? '',
        ]);

        // Tambahkan jadwal praktik default
        $hariList = ['senin - jumat', 'setiap hari'];

        foreach ($hariList as $hari) {
            JadwalPraktik::create([
                'dokter_id' => $dokter->id,
                'hari' => $hari,
            ]);
        }

        return redirect()->route('admin.dokter.index')->with('success', 'Akun dokter berhasil dibuat');
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        // Hapus relasi dokter jika ada
        if ($pengguna->role === 'dokter' && $pengguna->dokter) {
            // Hapus jadwal praktik terlebih dahulu jika ada
            $pengguna->dokter->jadwalPraktik()->delete();

            // Hapus data dokter
            $pengguna->dokter->delete();
        }

        // Hapus akun pengguna
        $pengguna->delete();

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }


    public function klien()
    {
        $pengguna = Pengguna::where('role', 'klien')->with('klien')->paginate(10);

        return view('Admin.Klien.kelolaklien', compact('pengguna'));
    }

    public function editklien($id)
    {
        $pengguna = Pengguna::with('klien')->findOrFail($id);
        return view('Admin.Klien.editKlien', compact('pengguna'));
    }

    public function updateKlien(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update([
            'email' => $request->email,
        ]);

        $pengguna->klien->update([
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.klien.index')->with('success', 'Data klien berhasil diperbarui.');
    }

    public function destroyKlien($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        // Hapus juga relasi ke tabel `klien` jika diperlukan
        $pengguna->klien()->delete(); // Jika menggunakan hasOne
        $pengguna->delete();

        return redirect()->route('admin.klien.index')->with('success', 'Data berhasil dihapus');
    }

    public function createKlien()
    {
        return view('Admin.Klien.tambahKlien');
    }

    public function storeKlien(Request $request)
    {
        $pengguna = Pengguna::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'klien',
        ]);

        $klien = Klien::create([
            'pengguna_id' => $pengguna->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('admin.klien.index')->with('success', 'Data klien berhasil ditambahkan.');
    }

    public function hewan()
    {
        $hewan = Hewan::with('klien')->paginate(10);

        return view('Admin.Hewan.kelolaHewan', compact('hewan'));
    }

    public function janji()
    {
        JanjiTemu::updateExpiredStatus();
        $data = JanjiTemu::with(['klien', 'dokter', 'hewan'])->paginate(10);
        return view('Admin.Janji-Temu.lihatJanji', compact('data'));
    }

    public function buatJanji()
    {
        $dokter = Dokter::all();
        $hewan = Hewan::all();
        $klien = Klien::all();

        return view('Admin.Janji-Temu.buatJanji', compact('dokter', 'hewan', 'klien'));
    }

    public function editJanji($id)
    {
        $janji = JanjiTemu::with(['klien', 'dokter', 'hewan'])->findOrFail($id);
        return view('Admin.Janji-Temu.editJanji', compact('janji'));
    }

    public function updateJanji(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,dijadwalkan,selesai,dibatalkan',
            'tanggal_janji' => 'required|date'
        ]);

        $janji = JanjiTemu::findOrFail($id);
        $janji->update([
            'status' => $request->status,
            'tanggal_janji' => $request->tanggal_janji,
        ]);

        return redirect()->route('admin.janji.index')->with('success', 'Status janji temu berhasil diperbarui.');
    }

    public function destroyJanji($id)
    {
        // Cari data janji temu berdasarkan ID
        $janji = JanjiTemu::findOrFail($id);

        // Hapus data tersebut
        $janji->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Janji temu berhasil dihapus.');
    }

}
