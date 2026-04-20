@extends('layout.master')

@section('title', 'Dokter Spesialis')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-user-md me-2" style="color: #0d9488;"></i>Dokter Hewan
    </h1>
</div>
<p style="color: #64748b; margin-top: -1rem; margin-bottom: 1.5rem;">Pilih dokter hewan spesialis untuk peliharaan Anda</p>

<div class="row">
    @forelse ($data as $d)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card text-center" style="border-radius: 1.25rem !important; border: 1px solid #e2e8f0 !important;">
                <div class="card-body p-4">
                    <div style="position: relative; display: inline-block; margin-bottom: 0.75rem;">
                        <div style="position: relative; display: inline-block; margin-bottom: 0.75rem;">
                            <img src="{{ optional($d->pengguna)->photo_profile ? asset('storage/' . $d->pengguna->photo_profile) : asset('img/profil.png') }}"
                                class="rounded-circle" style="width: 75px; height: 75px; border: 3px solid #ccfbf1; padding: 3px; object-fit: cover;" />
                            <div style="position: absolute; bottom: 2px; right: 2px; width: 18px; height: 18px; background: #10b981; border-radius: 50%; border: 2px solid white;"></div>
                        </div>
                    </div>
                    <h6 class="mb-1" style="font-weight: 700; color: #0f172a;">{{ $d->nama }}</h6>
                    <p class="small mb-3" style="color: #0d9488; font-weight: 600;">
                        <i class="fas fa-stethoscope me-1"></i>{{ $d->spesialisasi }}
                    </p>
                    <a href="{{ route('spesialis.show', $d->id) }}" class="btn btn-sm btn-primary w-100" style="border-radius: 9999px !important;">
                        <i class="fas fa-eye me-1"></i> Lihat Profil
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #f0fdfa, #ccfbf1); border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.25rem;">
                <i class="fas fa-user-md" style="font-size: 2rem; color: #0d9488;"></i>
            </div>
            <h5 style="font-weight: 700; color: #0f172a;">Belum Ada Dokter</h5>
            <p style="color: #64748b;">Data dokter belum tersedia saat ini.</p>
        </div>
    @endforelse
</div>
@endsection
