@extends('layout.master')

@section('title', 'Buat Janji Temu')

@section('content')
<h1 class="mt-4">Buat Janji Temu</h1>

<form action="" method="POST" class="mt-4">
    @csrf

    <div class="mb-3">
        <label for="dokter_id" class="form-label">Pilih Dokter</label>
        <select name="dokter_id" id="dokter_id" class="form-control" required>
            <option value="" disabled selected>-- Pilih Dokter --</option>
            @foreach ($dokter as $d)
                <option value="{{ $d->id }}">{{ $d->nama }} ({{ $d->spesialisasi }})</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="hewan_id" class="form-label">Pilih Hewan</label>
        <select name="hewan_id" id="hewan_id" class="form-control" required>
            <option value="" disabled selected>-- Pilih Hewan --</option>
            @foreach ($hewan as $h)
                <option value="{{ $h->id }}">{{ $h->nama }} ({{ $h->jenis }})</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="hewan_id" class="form-label">Pilih Hewan</label>
        <select name="hewan_id" id="hewan_id" class="form-control" required>
            <option value="" disabled selected>-- Pilih Hewan --</option>
            @foreach ($klien as $h)
                <option value="{{ $h->id }}">{{ $h->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tanggal_janji" class="form-label">Tanggal & Waktu Janji</label>
        <input type="datetime-local" name="tanggal_janji" id="tanggal_janji" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Buat Janji</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
