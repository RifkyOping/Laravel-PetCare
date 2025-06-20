@extends('layout.master')

@section('title', 'Edit Profil')

@section('content')
<h1 class="mt-4">Profil</h1>
<section style="background-color: #ffffff;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 mt-4">
                <div class="card-body text-center">
                    <img src="{{ asset('img/profil.png') }}" alt="avatar"class="rounded-circle img-fluid" style="width: 150px;">
                    <br>
                    <div class="d-flex justify-content-center mx-auto mt-3">
                        <a href="{{ route('profil.edit') }}">
                            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Edit Profil</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-0">
            <div class="card mb-4 mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nama Lengkap</p>
                        </div>
                        @if ($pengguna->role === 'klien')
                            <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->klien->nama }}</p>
                            </div>
                        @elseif($pengguna->role === 'dokter')
                            <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->dokter->nama }}</p>
                            </div>
                        @elseif($pengguna->role === 'admin')
                            <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->admin->nama }}</p>
                            </div>
                        @else
                            <p>Anda Belum Login</p>
                        @endif
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">No Telepon</p>
                        </div>
                        @if ($pengguna->role === 'klien')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->klien->no_telepon }}</p>
                            </div>
                        @elseif($pengguna->role === 'dokter')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->dokter->no_telepon }}</p>
                            </div>
                        @elseif ($pengguna->role === 'admin')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->admin->no_telepon }}</p>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Alamat</p>
                        </div>
                        @if ($pengguna->role === 'klien')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->klien->alamat }}</p>
                            </div>
                        @elseif($pengguna->role === 'dokter')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->dokter->alamat }}</p>
                            </div>
                        @elseif ($pengguna->role === 'admin')
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->admin->alamat }}</p>
                            </div>
                        @endif
                    </div>
                    @if($pengguna->role === 'dokter')
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Spesialis</p>
                        </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->dokter->spesialisasi }}</p>
                            </div>
                        @endif
                    </div>
                    @if ($pengguna->role === 'dokter')
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Jadwal Praktik</p>
                        </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ optional($pengguna->dokter->jadwalPraktik->first())->hari ?? '-' }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
