@extends('layout.master')

@section('title', 'Profil Dokter')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-user-md me-2" style="color: #0d9488;"></i>Profil Dokter
    </h1>
</div>

<section style="background-color: #ffffff;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4" style="border-radius: 1.5rem !important;">
                <div class="card-body text-center p-4">
                    <div style="position: relative; display: inline-block; margin-bottom: 0.75rem;">
                        <img src="{{ optional($data->pengguna)->photo_profile ? asset('storage/' . $data->pengguna->photo_profile) : asset('img/profil.png') }}"
                            class="rounded-circle" style="width: 140px; height: 140px; border: 3px solid #ccfbf1; padding: 3px; object-fit: cover;" />
                        <div style="position: absolute; bottom: 2px; right: 2px; width: 18px; height: 18px; background: #10b981; border-radius: 50%; border: 2px solid white;"></div>
                    </div>
                    <h5 class="my-3" style="font-weight: 700; color: #0f172a;">{{ explode(' ', $data->nama)[0] }}</h5>
                    <span style="display: inline-block; background: linear-gradient(135deg, #f0fdfa, #ccfbf1); color: #0d9488; font-size: 0.8rem; font-weight: 600; padding: 0.3rem 0.8rem; border-radius: 9999px;">
                        <i class="fas fa-stethoscope me-1"></i> {{ $data->spesialisasi }}
                    </span>
                    <div class="d-flex justify-content-center gap-2 mb-3 mt-3">
                        <a href="#" class="btn btn-sm" style="width: 36px; height: 36px; border-radius: 50%; background: #f0fdfa; color: #0d9488; display: flex; align-items: center; justify-content: center; border: 1px solid #ccfbf1;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-sm" style="width: 36px; height: 36px; border-radius: 50%; background: #f0fdfa; color: #0d9488; display: flex; align-items: center; justify-content: center; border: 1px solid #ccfbf1;"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-sm" style="width: 36px; height: 36px; border-radius: 50%; background: #f0fdfa; color: #0d9488; display: flex; align-items: center; justify-content: center; border: 1px solid #ccfbf1;"><i class="fab fa-whatsapp"></i></a>
                    </div>
                    <a href="{{ route('janji.buat', $data->id) }}" class="btn btn-primary w-100" style="border-radius: 9999px !important;">
                        <i class="fas fa-calendar-plus me-1"></i> Buat Janji Temu
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-0">
            <div class="card mb-4" style="border-radius: 1.5rem !important;">
                <div class="card-body p-4">
                    <h6 style="font-weight: 700; color: #0f172a; margin-bottom: 1rem;">
                        <i class="fas fa-info-circle me-2" style="color: #0d9488;"></i>Informasi Dokter
                    </h6>
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Nama Lengkap</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $data->nama }}</p>
                        </div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $data->pengguna->email }}</p>
                        </div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Telepon</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $data->no_telepon }}</p>
                        </div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Spesialis</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $data->spesialisasi }}</p>
                        </div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3">
                            <p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Jadwal Praktik</p>
                        </div>
                        <div class="col-sm-9">
                            @if($data->jadwalPraktik->isEmpty())
                                <p class="text-muted mb-0">Tidak ada jadwal praktik</p>
                            @else
                                <span class="text-muted mb-0">
                                    @foreach ($data->jadwalPraktik as $jadwal)
                                        <div class="mb-2">
                                            <i class="fas fa-check-circle me-2" style="color: #0d9488;"></i>
                                            <span style="font-weight: 500;">{{ $jadwal->hari_formatted }}</span>
                                        </div>
                                    @endforeach
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
