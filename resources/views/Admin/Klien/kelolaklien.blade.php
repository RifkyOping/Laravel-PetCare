@extends('layout.master')

@section('title', 'Kelola Data Klien')

@section('content')
<div class="container mt-4">
    <h1>Kelola Data Klien</h1>
    <a href="{{ route('Klien.tambah') }}" class="btn btn-primary mb-3">
        <i class="fas fa-user-plus"></i> Tambah Data Klien
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengguna as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->klien->nama }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->klien->no_telepon }}</td>
                    <td>{{ $p->klien->alamat }}</td>
                    <td class="text-center">
                        <a href="{{ route('klien.edit', $p->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('Klien.hapus', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pengguna.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
