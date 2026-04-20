@extends('layout.master')

@section('title', 'Tambah Hewan')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-plus-circle me-2" style="color: #0d9488;"></i>Tambah Hewan
    </h1>
</div>

<form action="{{ route('hewan.store') }}" method="POST">
@csrf
<section style="background-color: #ffffff;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4" style="border-radius: 1.5rem !important;">
                <div class="card-body text-center p-4">
                    <img src="{{ asset('img/profil.png') }}" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 130px; height: 130px; border: 4px solid #ccfbf1; padding: 4px;">
                    <div class="d-flex justify-content-center mb-2 mt-4">
                        <button type="submit" class="btn btn-primary" style="border-radius: 9999px !important;">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-0">
            <div class="card mb-4" style="border-radius: 1.5rem !important;">
                <div class="card-body p-4">
                    <h6 style="font-weight: 700; color: #0f172a; margin-bottom: 1rem;">
                        <i class="fas fa-paw me-2" style="color: #0d9488;"></i>Data Peliharaan Baru
                    </h6>
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Nama</p></div>
                        <div class="col-sm-9"><input type="text" name="nama" class="form-control" placeholder="Nama peliharaan" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Jenis</p></div>
                        <div class="col-sm-9"><input type="text" name="jenis" class="form-control" placeholder="Contoh: Kucing, Anjing" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Tanggal Lahir</p></div>
                        <div class="col-sm-9"><input type="date" name="tanggal_lahir" class="form-control" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Jenis Kelamin</p></div>
                        <div class="col-sm-9">
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="jantan">Jantan</option>
                                <option value="betina">Betina</option>
                            </select>
                        </div>
                    </div>
                    @if ($role === 'admin')
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Pilih Klien</p></div>
                        <div class="col-sm-9">
                            <select name="klien_id" class="form-control" required>
                                <option value="">-- Pilih Klien --</option>
                                @foreach ($daftarKlien as $klien)
                                    <option value="{{ $klien->id }}">{{ $klien->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
</form>
@endsection
