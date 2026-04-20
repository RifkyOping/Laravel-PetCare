@extends('layout.master')

@section('title', 'Daftar Pasien')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-paw me-2" style="color: #0d9488;"></i>Daftar Pasien
    </h1>
</div>

@if($data->isEmpty())
    <div class="text-center py-5">
        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #f0fdfa, #ccfbf1); border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.25rem;">
            <i class="fas fa-info-circle" style="font-size: 2rem; color: #0d9488;"></i>
        </div>
        <h5 style="font-weight: 700; color: #0f172a;">Belum Ada Pasien</h5>
        <p style="color: #64748b; max-width: 400px; margin: 0 auto;">Saat ini belum ada data pasien (hewan) yang ditangani oleh Anda.</p>
    </div>
@else
    <div class="row">
        @foreach ($data as $h)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card text-center" style="border-radius: 1.25rem !important; border: 1px solid #e2e8f0 !important;">
                <div class="card-body p-4">
                    <div style="position: relative; display: inline-block; margin-bottom: 0.75rem;">
                        <img src="{{ isset($h->foto_profil) && $h->foto_profil ? asset('storage/'.$h->foto_profil) : asset('img/profil.png') }}"
                             class="rounded-circle" style="width: 75px; height: 75px; border: 3px solid #ccfbf1; padding: 3px; object-fit: cover;" />
                        <div style="position: absolute; bottom: 2px; right: 2px; width: 18px; height: 18px; background: linear-gradient(135deg, #f59e0b, #fbbf24); border-radius: 50%; border: 2px solid white; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-heart" style="font-size: 0.5rem; color: white;"></i>
                        </div>
                    </div>
                    
                    <h5 class="card-title fw-bold" style="color: #0f172a;">{{ $h->nama }}</h5>
                    <p class="text-muted mb-3" style="font-size: 0.85rem;">{{ $h->jenis }} ({{ $h->umur }} thn)</p>
                    
                    <div style="background: #f8fafc; border-radius: 0.5rem; padding: 0.5rem; text-align: left; font-size: 0.8rem;" class="mb-3">
                        <i class="fas fa-user text-primary me-1"></i> Pemilik: {{ optional($h->klien)->nama ?? '-' }}
                    </div>
                    
                    <a href="{{ route('hewan.show', $h->id) }}" class="btn btn-outline-primary btn-sm w-100" style="border-radius: 9999px;">
                        Detail Hewan
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection
