<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use App\Models\Klien;
use App\Models\JadwalPraktik;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class AutentikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function register()
    {
        return view('Autentikasi.register');
    }

    public function submitRegistrasi(Request $request)
    {
        DB::beginTransaction();
        try {

            $pengguna = Pengguna::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            if ($request->role === 'klien') {

                Klien::create([
                    'pengguna_id' => $pengguna->id,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'no_telepon' => $request->no_telepon,
                ]);

            } elseif ($request->role === 'dokter') {

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
            }

            Auth::login($pengguna);
            $request->session()->regenerate();

            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Akun Berhasil Dibuat');
            } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors('Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Berhasil Login');
        }

        return back()->with('Error', 'Email atau password salah');
    }


    public function index()
    {
        return view('Autentikasi.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil Logout');

        // return view('Autentikasi.login');
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
    public function show(string $id)
    {
        //
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
