@extends('layout.master')

@section('title', 'Kelola Data Klien')

@section('content')
<div class="container mt-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
            <i class="fas fa-users me-2" style="color: #0d9488;"></i>Kelola Data Klien
        </h1>
        <a href="{{ route('admin.klien.tambah') }}" class="btn btn-primary" style="border-radius: 9999px !important;">
            <i class="fas fa-user-plus me-1"></i> Tambah Klien
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
                            <td style="font-weight: 600; color: #0f172a;">{{ $p->klien->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->klien->no_telepon }}</td>
                            <td>{{ $p->klien->alamat }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.klien.edit', $p->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.klien.hapus', $p->id) }}" method="POST" style="display:inline;">
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
                            <td colspan="6" class="text-center py-4" style="color: #64748b;">
                                <i class="fas fa-inbox me-2" style="font-size: 1.5rem; color: #cbd5e1;"></i><br>
                                Tidak ada data klien.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
            <div class="p-3">{{ $pengguna->links() }}</div>
        </div>
    </div>
</div>
@endsection
