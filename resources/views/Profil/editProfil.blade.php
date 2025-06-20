@extends('layout.master')

@section('title', 'Edit Profil')

@section('content')
<h1 class="mt-4">Edit Profil</h1>
<form action="{{ route('profil.update') }}" method="POST">
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
                            @if ($pengguna->role === 'klien')
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" value="{{ Auth::user()->klien->nama }}" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">No Telepon</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="no_telepon" value="{{ Auth::user()->klien->no_telepon }}" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Alamat</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="alamat" value="{{ Auth::user()->klien->alamat }}" class="form-control" required>
                                </div>
                            </div>
                        @elseif ($pengguna->role === 'dokter')
                            <div class="col-sm-3">
                                <p class="mb-0">Nama Lengkap</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="nama" value="{{ Auth::user()->dokter->nama }}" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">No Telepon</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="no_telepon" value="{{ Auth::user()->dokter->no_telepon }}" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" value="{{ Auth::user()->dokter->alamat }}" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Spesialis</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="spesialisasi" value="{{ Auth::user()->dokter->spesialisasi }}" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Jadwal Praktik</p>
                            </div>
                            <div class="col-sm-9">
                               {{-- <select name="hari" class="form-control" required>
                                    <option value="" disabled {{ optional(Auth::user()->dokter->jadwalPraktik->first())->hari == null ? 'selected' : '' }}>--> Pilih Jadwal Praktik <--</option>
                                    <option value="Senin - Jumat" {{ optional(Auth::user()->dokter->jadwalPraktik->first())->hari == 'Senin - Jumat' ? 'selected' : '' }}>Senin - Jumat</option>
                                    <option value="Setiap Hari" {{ optional(Auth::user()->dokter->jadwalPraktik->first())->hari == 'Setiap Hari' ? 'selected' : '' }}>Setiap Hari</option>
                                </select> --}}
                                <select name="hari" class="form-control" required>
    <option disabled {{ old('hari', optional(Auth::user()->dokter->jadwalPraktik->first())->hari) ? '' : 'selected' }}>
        --> Pilih Jadwal Praktik <--
    </option>
    <option value="Senin - Jumat" {{ old('hari', optional(Auth::user()->dokter->jadwalPraktik->first())->hari) == 'Senin - Jumat' ? 'selected' : '' }}>
        Senin - Jumat
    </option>
    <option value="Setiap Hari" {{ old('hari', optional(Auth::user()->dokter->jadwalPraktik->first())->hari) == 'Setiap Hari' ? 'selected' : '' }}>
        Setiap Hari
    </option>
</select>

                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
