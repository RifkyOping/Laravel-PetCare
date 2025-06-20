@extends('layout.master')

@section('title', 'Peliharaan')

@section('content')
<h1 class="mt-4">Peliharaan</h1>
<div class="row">
    @forelse ($hewan as $h)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card text-center" style="border-radius: 10px;">
                <div class="card-body p-3">
                    <img src="{{ asset('img/profil.png') }}"
                         class="rounded-circle mb-2" style="width: 60px; height: 60px;" />
                    <h6 class="mb-1">{{ $h->nama }}</h6>
                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-whatsapp"></i></a>
                    </div>
                    <a href="{{ route('hewan.show', $h->id) }}" class="btn btn-sm btn-primary">Lihat Profil</a>
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
