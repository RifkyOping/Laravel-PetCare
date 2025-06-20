@extends('layout.master')

@section('title', 'Kelola Data Peliharaan')

@section('content')
<div class="container mt-4">
    <h1>Kelola Data Peliharaan</h1>
    <a href="{{ route('hewan.tambah') }}" class="btn btn-primary mb-3">
        <i class="fas fa-user-plus"></i> Tambah Data Peliharaan
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Pemilik</th>
                <th>Jenis</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hewan as $h)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $h->nama }}</td>
                    <td>{{ $h->klien->nama ?? '-' }}</td>
                    <td>{{ $h->jenis ?? '-' }}</td>
                    <td>{{ $h->umur ?? '-' }}</td>
                    <td>{{ $h->jenis_kelamin ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('hewan.edit', $h->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('hewan.hapus', ['jenis' => $h->jenis, 'id' => $h->id]) }}" method="POST" style="display:inline;">
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
