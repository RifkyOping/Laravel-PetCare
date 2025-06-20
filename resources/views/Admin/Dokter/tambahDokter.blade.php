@extends('layout.master')

@section('title', 'Tambah Data Dokter')

@section('content')
<h1 class="mt-4">Tambah Data Dokter</h1>
<form action="{{ route('Dokter.tambahkan') }}" method="POST">
@csrf
<section style="background-color: #ffffff;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="{{ asset('img/profil.png') }}" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                    {{-- <h5 class="my-3">{{ $pelanggan->nama }}</h5> --}}
                    {{-- <div class="d-flex justify-content-center gap-2 mb-2">
                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-whatsapp"></i></a>
                    </div> --}}
                    <div class="d-flex justify-content-center mb-2 mt-4">
                        {{-- <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Follow</button> --}}
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-lg-8 offset-lg-0">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama Lengkap</p>
                            </div>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">No Telepon</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="no_telepon" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Alamat</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="alamat" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Spesialis</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="spesialisasi" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Jadwal Praktik</p>
                            </div>
                            <div class="col-sm-9">
                               <select name="hari" class="form-control" required>
                                    <option value="" >--> Pilih Jadwal Praktik <--</option>
                                    <option value="Senin - Jumat">Senin - Jumat</option>
                                    <option value="Setiap Hari">Setiap Hari</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
