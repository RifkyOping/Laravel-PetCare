@extends('layout.master')

@section('title', 'Peliharaan')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-paw me-2" style="color: #0d9488;"></i>Peliharaan
    </h1>
</div>
<p style="color: #64748b; margin-top: -1rem; margin-bottom: 1.5rem;">Daftar hewan peliharaan Anda</p>

<div class="row">
    @forelse ($hewan as $h)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card text-center" style="border-radius: 1.25rem !important; border: 1px solid #e2e8f0 !important;">
                <div class="card-body p-4">
                    <div style="position: relative; display: inline-block; margin-bottom: 0.75rem;">
                        <img src="{{ $h->foto_profil ? asset('storage/' . $h->foto_profil) : asset('img/profil.png') }}"
                             class="rounded-circle" style="width: 75px; height: 75px; border: 3px solid #ccfbf1; padding: 3px; object-fit: cover;" />
                        <div style="position: absolute; bottom: 2px; right: 2px; width: 18px; height: 18px; background: linear-gradient(135deg, #f59e0b, #fbbf24); border-radius: 50%; border: 2px solid white; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-heart" style="font-size: 0.5rem; color: white;"></i>
                        </div>
                    </div>
                    <h6 class="mb-2" style="font-weight: 700; color: #0f172a;">{{ $h->nama }}</h6>
                    <a href="{{ route('hewan.show', $h->id) }}" class="btn btn-sm btn-primary w-100" style="border-radius: 9999px !important;">
                        <i class="fas fa-eye me-1"></i> Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #f0fdfa, #ccfbf1); border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.25rem;">
                <i class="fas fa-cat" style="font-size: 2rem; color: #0d9488;"></i>
            </div>
            <h5 style="font-weight: 700; color: #0f172a;">Belum Ada Peliharaan</h5>
            <p style="color: #64748b; max-width: 400px; margin: 0 auto 1rem;">Anda belum menambahkan hewan peliharaan.</p>
            <a href="{{ route('hewan.tambah') }}" class="btn btn-primary" style="border-radius: 9999px !important;">
                <i class="fas fa-plus me-1"></i> Tambah Peliharaan
            </a>
        </div>
    @endforelse
</div>
@endsection
