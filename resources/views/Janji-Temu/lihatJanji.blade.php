@extends('layout.master')

@section('title', 'Daftar Janji Temu')

@section('content')
<h1 class="mt-4">Janji Temu</h1>

@if($data->isEmpty())
    <div class="alert alert-warning text-center">
        Tidak ada jadwal janji temu.
    </div>
@else
    <div class="row">
        @foreach ($data as $d)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-center shadow-lg" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <h5 class="mb-2">Janji ke-{{ $loop->iteration }}</h5>
                        <br>
                        <p class="text-muted mb-2" style="font-size: 1.1rem;">
                            <strong>Nama Dokter :</strong> {{ $d->dokter->nama }}
                        </p>
                        <p class="text-muted mb-2" style="font-size: 1.1rem;">
                            <strong>Nama Hewan :</strong> {{ $d->hewan->nama }}
                        </p>
                        <p class="text-muted mb-3" style="font-size: 1.1rem;">
                            <strong>Tanggal Janji :</strong>
                            {{ \Carbon\Carbon::parse($d->tanggal_janji)->format('d M Y H:i') }}
                        </p>
                        <br>
                        <span class="badge py-2 px-3 fs-6
                            @if($d->status == 'menunggu') bg-secondary
                            @elseif($d->status == 'dijadwalkan') bg-info
                            @elseif($d->status == 'selesai') bg-success
                            @elseif($d->status == 'dibatalkan') bg-danger
                            @endif
                        ">
                            {{ ucfirst($d->status) }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
