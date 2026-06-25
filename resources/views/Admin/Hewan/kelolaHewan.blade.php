@extends('layout.master')

@section('title', 'Kelola Data Peliharaan')

@section('content')
<div class="container mt-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
            <i class="fas fa-paw me-2" style="color: #0d9488;"></i>Kelola Data Peliharaan
        </h1>
        <a href="{{ route('hewan.tambah') }}" class="btn btn-primary" style="border-radius: 9999px !important;">
            <i class="fas fa-plus me-1"></i> Tambah Peliharaan
        </a>
    </div>

    <div class="card" style="border-radius: 1rem !important; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
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
                            <td style="font-weight: 600; color: #0f172a;">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $h->foto_profil ? asset('storage/' . $h->foto_profil) : asset('img/profil.png') }}" class="rounded-circle me-2" style="width: 32px; height: 32px; object-fit: cover;" alt="avatar">
                                    {{ $h->nama }}
                                </div>
                            </td>
                            <td>{{ $h->klien->nama ?? '-' }}</td>
                            <td><span style="background: #f0fdfa; color: #0d9488; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600;">{{ $h->jenis ?? '-' }}</span></td>
                            <td>{{ $h->umur ?? '-' }}</td>
                            <td>{{ $h->jenis_kelamin ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('hewan.edit', $h->id) }}" class="btn btn-sm btn-warning me-1">
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
                            <td colspan="7" class="text-center py-4" style="color: #64748b;">
                                <i class="fas fa-inbox me-2" style="font-size: 1.5rem; color: #cbd5e1;"></i><br>
                                Tidak ada data peliharaan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
            <div class="p-3">{{ $hewan->links() }}</div>
        </div>
    </div>
</div>
@endsection
