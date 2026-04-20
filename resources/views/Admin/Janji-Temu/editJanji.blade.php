@extends('layout.master')

@section('title', 'Edit Status Janji Temu')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <h2 class="mb-4 text-center fw-bold"><i class="fas fa-calendar-check me-2 text-primary"></i>Edit Status Janji Temu</h2>
        
        <div class="card" style="border-radius: 1.5rem; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <div class="card-body p-4">
                <form action="{{ route('admin.janji.update', $janji->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3 p-3" style="background: #f8fafc; border-radius: 1rem;">
                        <p class="mb-1"><strong>Pasien (Hewan):</strong> {{ $janji->hewan->nama ?? '-' }} ({{ $janji->hewan->jenis ?? '-' }})</p>
                        <p class="mb-1"><strong>Pemilik (Klien):</strong> {{ $janji->klien->nama ?? '-' }}</p>
                        <p class="mb-1"><strong>Dokter:</strong> {{ $janji->dokter->nama ?? '-' }}</p>
                    </div>

                    <div class="form-group mb-4">
                        <label for="tanggal_janji" class="fw-semibold mb-2">Tanggal & Waktu Janji Temu</label>
                        <input type="datetime-local" class="form-control" style="border-radius: 0.5rem;" id="tanggal_janji" name="tanggal_janji" 
                               value="{{ \Carbon\Carbon::parse($janji->tanggal_janji)->format('Y-m-d\TH:i') }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="status" class="fw-semibold mb-2">Status Janji Temu</label>
                        <select class="form-select" style="border-radius: 0.5rem;" id="status" name="status" required>
                            <option value="menunggu" @if($janji->status == 'menunggu') selected @endif>Menunggu</option>
                            <option value="dijadwalkan" @if($janji->status == 'dijadwalkan') selected @endif>Dijadwalkan (Disetujui)</option>
                            <option value="selesai" @if($janji->status == 'selesai') selected @endif>Selesai</option>
                            <option value="dibatalkan" @if($janji->status == 'dibatalkan') selected @endif>Dibatalkan</option>
                        </select>
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('admin.janji.lihat') }}" class="btn btn-secondary px-4" style="border-radius: 9999px;">Batal</a>
                        <button type="submit" class="btn btn-primary px-4" style="border-radius: 9999px;">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
