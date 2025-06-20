@extends('layout.master')

@section('title', 'Edit Data Klien')

@section('content')
<h1 class="mt-4">Edit Data Klien</h1>
<form action="{{ route('klien.update', $pengguna->id) }}" method="POST">
@csrf
@method('PUT')
<section style="background-color: #ffffff;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="{{ asset('img/profil.png') }}" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                    <div class="d-flex justify-content-center mb-2 mt-4">
                        <button type="submit" class="btn btn-outline-primary ms-1">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-0">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3"><p class="mb-0">Nama Lengkap</p></div>
                        <div class="col-sm-9">
                            <input type="text" name="nama" value="{{ $pengguna->klien->nama }}" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3"><p class="mb-0">Email</p></div>
                        <div class="col-sm-9">
                            <input type="email" name="email" value="{{ $pengguna->email }}" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3"><p class="mb-0">No Telepon</p></div>
                        <div class="col-sm-9">
                            <input type="text" name="no_telepon" value="{{ $pengguna->klien->no_telepon }}" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3"><p class="mb-0">Alamat</p></div>
                        <div class="col-sm-9">
                            <textarea name="alamat" class="form-control" rows="3" required>{{ $pengguna->klien->alamat }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
@endsection
