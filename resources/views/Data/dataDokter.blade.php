@extends('layout.master')

@section('title', 'Dokter Spesialis')

@section('content')
<h1 class="mt-4">Dokter</h1>
<div class="row">
    @forelse ($data as $d)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card text-center" style="border-radius: 10px;">
                <div class="card-body p-3">
                    <img src="{{ asset('img/profil.png') }}"
                         class="rounded-circle mb-2" style="width: 60px; height: 60px;" />
                    <h6 class="mb-1">{{ $d->nama }}</h6>
                    <p class="text-muted small">{{ $d->spesialisasi }}</p>
                    <a href="{{ route('spesialis.show', $d->id) }}" class="btn btn-sm btn-primary">Lihat Profil</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <div class="alert alert-warning">
                Tidak ada data Peliharaan
            </div>
        </div>
    @endforelse
</div>
@endsection
