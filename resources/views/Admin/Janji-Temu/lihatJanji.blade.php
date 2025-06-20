@extends('layout.master')

@section('title', 'Kelola Janji Temu')

@section('content')
<div class="container mt-4">
    <h1>Kelola Janji Temu</h1>
    <a href="{{ route('admin.janji.buat') }}" class="btn btn-primary">
        <i class="fas fa-user-plus"></i> Tambah Janji Temu
    </a>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama Klien</th>
                <th>Nama Dokter</th>
                <th>Nama Hewan</th>
                <th>Tanggal Janji</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $d)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $d->klien->nama ?? '-' }}</td>
                    <td>{{ $d->dokter->nama ?? '-' }}</td>
                    <td>{{ $d->hewan->nama ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($d->tanggal_janji)->format('d M Y H:i') }}</td>
                    <td class="text-center">
                        <span class="badge
                            @if($d->status == 'menunggu') bg-secondary
                            @elseif($d->status == 'dijadwalkan') bg-info
                            @elseif($d->status == 'selesai') bg-success
                            @elseif($d->status == 'dibatalkan') bg-danger
                            @endif">
                            {{ ucfirst($d->status) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('janji.hapus', $d->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus janji ini?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data janji temu.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
