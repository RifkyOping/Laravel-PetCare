<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hewan;
use App\Models\Klien;

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
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'klien_id' => Auth::user()->role === 'admin' ? 'required|exists:klien,id' : '',
        ]);

        if (Auth::user()->role === 'admin') {
            $klien_id = $request->klien_id;
        } else {
            $klien = Klien::where('pengguna_id', Auth::id())->first();
            $klien_id = $klien->id ?? null;
        }

        Hewan::create([
            'klien_id' => $klien_id,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        $jenis = strtolower($request->jenis);

        if (Auth::user()->role === 'klien') {
            return redirect()->route('hewan.jenis', $jenis)->with('success', 'Data hewan berhasil disimpan.');
        }elseif (Auth::user()->role === 'admin') {
            return redirect()->route('kelola.hewan')->with('success', 'Data hewan berhasil disimpan.');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
        ]);

        $hewan = Hewan::findOrFail($id);
        $hewan->update($request->all());

        if (Auth::user()->role === 'klien') {
            return redirect()->route('hewan.show', ['id' => $hewan->id])->with('success', 'Data hewan berhasil diperbarui.');
        }elseif (Auth::user()->role === 'admin') {
            return redirect()->route('kelola.hewan')->with('success', 'Data hewan berhasil diperbarui.');
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
        }
        
        return redirect()->back()->with('success', 'Janji temu berhasil dihapus.');
    }

}
