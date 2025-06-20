@extends('layout.master')

@section('title', 'Buat Janji Temu')

@section('content')
<h1 class="mt-4">Buat Janji dengan {{ $dokter->nama }}</h1>

<form action="{{ route('janji.store') }}" method="POST" class="mt-4">
    @csrf

    <input type="hidden" name="dokter_id" value="{{ $dokter->id }}">

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
        <label for="tanggal_janji" class="form-label">Tanggal & Waktu Janji</label>
        <input type="datetime-local" name="tanggal_janji" id="tanggal_janji" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Buat Janji</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
