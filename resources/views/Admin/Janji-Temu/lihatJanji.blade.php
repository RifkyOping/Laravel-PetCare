@extends('layout.master')

@section('title', 'Kelola Janji Temu')

@section('content')
<div class="container mt-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
            <i class="fas fa-calendar-check me-2" style="color: #0d9488;"></i>Kelola Janji Temu
        </h1>
        <a href="{{ route('admin.janji.buat') }}" class="btn btn-primary" style="border-radius: 9999px !important;">
            <i class="fas fa-plus me-1"></i> Tambah Janji Temu
        </a>
    </div>

    <div class="card" style="border-radius: 1rem !important; overflow: hidden;">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
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
                            <td style="font-weight: 600; color: #0f172a;">{{ $d->klien->nama ?? '-' }}</td>
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
                                    <i class="fas
                                        @if($d->status == 'menunggu') fa-hourglass-half
                                        @elseif($d->status == 'dijadwalkan') fa-calendar-check
                                        @elseif($d->status == 'selesai') fa-check-circle
                                        @elseif($d->status == 'dibatalkan') fa-times-circle
                                        @endif me-1"></i>
                                    {{ ucfirst($d->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.janji.edit', $d->id) }}" class="btn btn-sm btn-warning me-1">
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
                            <td colspan="7" class="text-center py-4" style="color: #64748b;">
                                <i class="fas fa-inbox me-2" style="font-size: 1.5rem; color: #cbd5e1;"></i><br>
                                Tidak ada data janji temu.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
