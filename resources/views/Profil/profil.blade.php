@extends('layout.master')

@section('title', 'Profil')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-user me-2" style="color: #0d9488;"></i>Profil
    </h1>
</div>

<section style="background-color: #ffffff;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 mt-0" style="border-radius: 1.5rem !important;">
                <div class="card-body text-center p-4">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{ $pengguna->photo_profile ? asset('storage/' . $pengguna->photo_profile) : asset('img/profil.png') }}" 
                            alt="avatar" 
                            class="rounded-circle img-fluid" 
                            style="width: 220px; height: 220px; border: 4px solid #ccfbf1; padding: 4px; object-fit: cover;">
                    </div>
                    <br>
                    <div class="d-flex justify-content-center mx-auto mt-3">
                        <a href="{{ route('profil.edit') }}" class="btn btn-primary" style="border-radius: 9999px !important;">
                            <i class="fas fa-edit me-1"></i> Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-0">
            <div class="card mb-4 mt-0" style="border-radius: 1.5rem !important;">
                <div class="card-body p-4">
                    <h6 style="font-weight: 700; color: #0f172a; margin-bottom: 1rem;">
                        <i class="fas fa-info-circle me-2" style="color: #0d9488;"></i>Informasi Profil
                    </h6>
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Nama Lengkap</p>
                        </div>
                        @if ($pengguna->role === 'klien')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->klien->nama }}</p>
                            </div>
                        @elseif($pengguna->role === 'dokter')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->dokter->nama }}</p>
                            </div>
                        @elseif($pengguna->role === 'admin')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ optional(Auth::user()->admin)->nama ?? '-' }}</p>
                            </div>
                        @else
                            <p>Anda Belum Login</p>
                        @endif
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">No Telepon</p>
                        </div>
                        @if ($pengguna->role === 'klien')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->klien->no_telepon }}</p>
                            </div>
                        @elseif($pengguna->role === 'dokter')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->dokter->no_telepon }}</p>
                            </div>
                        @elseif ($pengguna->role === 'admin')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ optional(Auth::user()->admin)->no_telepon ?? '-' }}</p>
                            </div>
                        @endif
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Alamat</p>
                        </div>
                        @if ($pengguna->role === 'klien')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->klien->alamat }}</p>
                            </div>
                        @elseif($pengguna->role === 'dokter')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->dokter->alamat }}</p>
                            </div>
                        @elseif ($pengguna->role === 'admin')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ optional(Auth::user()->admin)->alamat ?? '-' }}</p>
                            </div>
                        @endif
                    </div>
                    @if($pengguna->role === 'dokter')
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Spesialis</p>
                        </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->dokter->spesialisasi }}</p>
                            </div>
                        </div>
                    @endif
                    
                    @if ($pengguna->role === 'dokter')
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Jadwal Praktik</p>
                        </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ optional($pengguna->dokter->jadwalPraktik->first())->hari ?? '-' }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection