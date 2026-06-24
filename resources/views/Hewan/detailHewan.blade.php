@extends('layout.master')

@section('title', 'Peliharaan')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-paw me-2" style="color: #0d9488;"></i>Detail Peliharaan
    </h1>
</div>

<section style="background-color: #ffffff;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4" style="border-radius: 1.5rem !important;">
                <div class="card-body text-center p-4">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{ $detailHewan->foto_profil ? asset('storage/' . $detailHewan->foto_profil) : asset('img/profil.png') }}" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 130px; height: 130px; border: 4px solid #ccfbf1; padding: 4px; object-fit: cover;">
                        <div style="position: absolute; bottom: 5px; right: 5px; width: 24px; height: 24px; background: linear-gradient(135deg, #f59e0b, #fbbf24); border-radius: 50%; border: 3px solid white; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-heart" style="font-size: 0.55rem; color: white;"></i>
                        </div>
                    </div>
                    <h5 class="my-3" style="font-weight: 700; color: #0f172a;">{{ $detailHewan->nama }}</h5>
                    <span style="display: inline-block; background: linear-gradient(135deg, #f0fdfa, #ccfbf1); color: #0d9488; font-size: 0.8rem; font-weight: 600; padding: 0.3rem 0.8rem; border-radius: 9999px;">
                        <i class="fas fa-tag me-1"></i> {{ $detailHewan->jenis }}
                    </span>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        @if(Auth::user()->role !== 'dokter')
                        <a href="{{ route('hewan.edit', $detailHewan->id) }}" class="btn btn-primary" style="border-radius: 9999px !important;">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        <form action="{{ route('hewan.hapus', ['jenis' => $detailHewan->jenis, 'id' => $detailHewan->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="border-radius: 9999px !important;" onclick="return confirm('Yakin hapus data ini?')">
                                <i class="fas fa-trash me-1"></i> Hapus
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-0">
            <div class="card mb-4" style="border-radius: 1.5rem !important;">
                <div class="card-body p-4">
                    <h6 style="font-weight: 700; color: #0f172a; margin-bottom: 1rem;">
                        <i class="fas fa-info-circle me-2" style="color: #0d9488;"></i>Informasi Peliharaan
                    </h6>
                    <div class="row py-2">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Nama</p></div>
                        <div class="col-sm-9"><p class="text-muted mb-0">{{ $detailHewan->nama }}</p></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Jenis</p></div>
                        <div class="col-sm-9"><p class="text-muted mb-0">{{ $detailHewan->jenis }}</p></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Umur</p></div>
                        <div class="col-sm-9"><p class="text-muted mb-0">{{ $detailHewan->umur }}</p></div>
                    </div>
                    <hr style="border-color: #f1f5f9; margin: 0.5rem 0;">
                    <div class="row py-2">
                        <div class="col-sm-3"><p class="mb-0" style="font-weight: 600; color: #0f172a; font-size: 0.88rem;">Jenis Kelamin</p></div>
                        <div class="col-sm-9"><p class="text-muted mb-0">{{ $detailHewan->jenis_kelamin }}</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
