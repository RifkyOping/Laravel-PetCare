@extends('layout.master')

@section('title', 'Edit Data Dokter')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-user-edit me-2" style="color: #0d9488;"></i>Edit Data Dokter
    </h1>
</div>

<form action="{{ route('Dokter.simpan', $dataDokter->id) }}" method="POST">
@csrf
@method('PUT')
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
                        <i class="fas fa-user-md me-2" style="color: #0d9488;"></i>Informasi Dokter
                    </h6>
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Nama Lengkap</p></div>
                        <div class="col-sm-9"><input type="text" name="nama" value="{{ $dataDokter->dokter->nama }}" class="form-control" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Email</p></div>
                        <div class="col-sm-9"><input type="text" name="email" value="{{ $dataDokter->email }}" class="form-control" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">No Telepon</p></div>
                        <div class="col-sm-9"><input type="text" name="no_telepon" value="{{ $dataDokter->dokter->no_telepon }}" class="form-control" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Alamat</p></div>
                        <div class="col-sm-9"><input type="text" name="alamat" value="{{ $dataDokter->dokter->alamat }}" class="form-control" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Spesialis</p></div>
                        <div class="col-sm-9"><input type="text" name="spesialisasi" value="{{ $dataDokter->dokter->spesialisasi }}" class="form-control" required></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Jadwal Praktik</p></div>
                        <div class="col-sm-9">
                           <select name="hari" class="form-control" required>
                                <option value="" disabled {{ optional($dataDokter->dokter->jadwalPraktik->first())->hari == null ? 'selected' : '' }}>-- Pilih Jadwal Praktik --</option>
                                <option value="Senin - Jumat" {{ optional($dataDokter->dokter->jadwalPraktik->first())->hari == 'Senin - Jumat' ? 'selected' : '' }}>Senin - Jumat</option>
                                <option value="Setiap Hari" {{ optional($dataDokter->dokter->jadwalPraktik->first())->hari == 'Setiap Hari' ? 'selected' : '' }}>Setiap Hari</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
@endsection
