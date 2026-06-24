<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use App\Models\Klien;
use Illuminate\Support\Facades\DB;

class AutentikasiController extends Controller
{
    public function register()
    {
        return view('Autentikasi.register');
    }

    public function submitRegistrasi(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|string|min:8|confirmed',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            // Force role to 'klien' — registration is only for clients
            $pengguna = Pengguna::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'klien',
            ]);

            Klien::create([
                'pengguna_id' => $pengguna->id,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
            ]);

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

        return back()->with('error', 'Email atau password salah');
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
    }
}
