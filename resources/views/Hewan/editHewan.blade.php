@extends('layout.master')

@section('title', 'Edit Hewan')

@section('content')
<h1 class="mt-4">Edit Hewan</h1>
<form action="{{ route('hewan.update', $dataHewan->id) }}" method="POST">
@csrf
@method('PUT')
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
                            <p class="mb-0">Nama Peliharaan</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="nama" value="{{ $dataHewan->nama }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Jenis</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="jenis" value="{{ $dataHewan->jenis }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Umur</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="umur" value="{{ $dataHewan->umur }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Jenis Kelamin</p>
                        </div>
                        <div class="col-sm-9">
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="" disabled {{ optional($dataHewan)->jenis_kelamin == null ? 'selected' : '' }}>--> Pilih Jenis Kelamin <--</option>
                                <option value="Jantan" {{ optional($dataHewan)->jenis_kelamin == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                                <option value="Betina" {{ optional($dataHewan)->jenis_kelamin == 'Betina' ? 'selected' : '' }}>Betina</option>
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
