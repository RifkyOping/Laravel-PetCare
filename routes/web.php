<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AutentikasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\PenggunaController;
use App\Http\Middleware\PreventBackHistory;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AutentikasiController::class, 'index'])->name('login');
Route::post('/login/submit', [AutentikasiController::class, 'login'])->name('login.submit');

Route::get('/register', [AutentikasiController::class, 'register'])->name('regis');
Route::post('/register/submit', [AutentikasiController::class, 'submitRegistrasi'])->name('regis.submit');

Route::middleware(['auth', PreventBackHistory::class])->group(function () {

    // View Only Pet Details (Klien, Admin, Dokter)
    Route::middleware(['auth', 'role:klien,admin,dokter'])->group(function () {
        Route::get('/detailPeliharaan/{id}', [HewanController::class, 'detail'])->name('hewan.show');
    });

    // Shared Edit/Delete Routes Klien & Admin
    Route::middleware(['auth', 'role:klien,admin'])->group(function () {
        Route::get('/hewan/jenis/{jenis}', [HewanController::class, 'filterByJenis'])->name('hewan.jenis');
        Route::get('/hewan/{id}/edit', [HewanController::class, 'edit'])->name('hewan.edit');
        Route::put('/hewan/{id}', [HewanController::class, 'update'])->name('hewan.update');
        Route::get('/tambah/hewan', [HewanController::class, 'tambah'])->name('hewan.tambah');
        Route::post('/hewan/simpan', [HewanController::class, 'store'])->name('hewan.store');
        Route::delete('/hewan/{jenis}/{id}', [HewanController::class, 'destroy'])->name('hewan.hapus');
    });

    Route::middleware(['auth', 'role:klien'])->group(function () {
        Route::get('/lihatDokter', [DokterController::class, 'data'])->name('lihat.dokter');
        Route::get('/dataDokter/{id}', [DokterController::class, 'show'])->name('spesialis.show');

        // Janji Temu Klien
        Route::get('/lihatJanjiTemu', [KlienController::class, 'index'])->name('janji.lihat');
        Route::get('/buat-janji/{dokter}', [KlienController::class, 'create'])->name('janji.buat');
        Route::post('/buat-janji', [KlienController::class, 'store'])->name('janji.store');
    });
    Route::get('/dashboard', [Dashboard::class, 'dash'])->name('dashboard');

    Route::post('/home', [AutentikasiController::class, 'logout'])->name('logout');
    Route::get('/profil', [PenggunaController::class, 'show'])->name('profile.show');
    Route::get('/profil/edit', [PenggunaController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/update', [PenggunaController::class, 'update'])->name('profil.update');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dataKlien', [AdminController::class, 'klien'])->name('kelola.klien');
        Route::get('/klien/{id}/edit', [AdminController::class, 'editKlien'])->name('klien.edit');
        Route::put('/klien/{id}', [AdminController::class, 'updateKlien'])->name('klien.update');
        Route::delete('/klien/{id}', [AdminController::class, 'destroyKlien'])->name('Klien.hapus');
        Route::get('/klien/tambah', [AdminController::class, 'createKlien'])->name('Klien.tambah');
        Route::post('/klien/simpan', [AdminController::class, 'storeKlien'])->name('Klien.simpan');

        Route::get('/dataHewan', [AdminController::class, 'hewan'])->name('kelola.hewan');

        Route::get('/dataDokter', [AdminController::class, 'dokter'])->name('kelola.dokter');
        Route::get('/editDokter/{id}/edit', [AdminController::class, 'editDokter'])->name('Dokter.edit');
        Route::put('/editDokter/{id}', [AdminController::class, 'simpanDokter'])->name('Dokter.simpan');
        Route::get('/tambahDokter', [AdminController::class, 'tambahDokter'])->name('Dokter.tambah');
        Route::post('/tambahDataDokter', [AdminController::class, 'tambahkanDokter'])->name('Dokter.tambahkan');
        Route::delete('/hapusDokter/{id}', [AdminController::class, 'destroy'])->name('Dokter.hapus');

        Route::get('/kelola-janji', [AdminController::class, 'janji'])->name('admin.janji.lihat');
        Route::get('/janji-temu/{id}/edit', [AdminController::class, 'editJanji'])->name('admin.janji.edit');
        Route::put('/janji-temu/{id}', [AdminController::class, 'updateJanji'])->name('admin.janji.update');
        Route::delete('/janji-temu/{id}', [AdminController::class, 'destroyJanji'])->name('janji.hapus');
        Route::get('/buat-janji-temu', [AdminController::class, 'buatJanji'])->name('admin.janji.buat');
    });
    Route::middleware(['auth', 'role:dokter'])->group(function () {
        Route::get('/jadwal-janji', [DokterController::class, 'jadwalJanji'])->name('dokter.janji');
        Route::get('/daftar-pasien', [DokterController::class, 'daftarPasien'])->name('dokter.pasien');
        Route::put('/jadwal-janji/{id}/setujui', [DokterController::class, 'setujuiJanji'])->name('dokter.janji.setujui');
    });

});
