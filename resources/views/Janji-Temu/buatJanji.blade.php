@extends('layout.master')

@section('title', 'Buat Janji Temu')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-calendar-plus me-2" style="color: #0d9488;"></i>Buat Janji dengan {{ $dokter->nama }}
    </h1>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card" style="border-radius: 1.5rem !important; overflow: hidden;">
            <div class="card-header text-center">
                <h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Form Janji Temu</h5>
            </div>
            <div class="card-body p-4">
                <div style="background: linear-gradient(135deg, #f0fdfa, #ccfbf1); border-radius: 1rem; padding: 1rem 1.25rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 45px; height: 45px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                        <i class="fas fa-user-md" style="color: #0d9488; font-size: 1.1rem;"></i>
                    </div>
                    <div>
                        <p class="mb-0" style="font-weight: 700; color: #0f172a; font-size: 0.95rem;">{{ $dokter->nama }}</p>
                        <p class="mb-0" style="color: #64748b; font-size: 0.8rem;">Dokter Hewan</p>
                    </div>
                </div>

                <form action="{{ route('janji.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="dokter_id" value="{{ $dokter->id }}">

                    <div class="mb-4">
                        <label for="hewan_id" class="form-label" style="font-weight: 600; color: #0f172a;">
                            <i class="fas fa-paw me-1" style="color: #f59e0b;"></i> Pilih Hewan
                        </label>
                        <select name="hewan_id" id="hewan_id" class="form-control" required>
                            <option value="" disabled selected>-- Pilih Hewan --</option>
                            @foreach ($hewan as $h)
                                <option value="{{ $h->id }}">{{ $h->nama }} ({{ $h->jenis }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_janji" class="form-label" style="font-weight: 600; color: #0f172a;">
                            <i class="fas fa-clock me-1" style="color: #7c3aed;"></i> Tanggal & Waktu Janji
                        </label>
                        <input type="datetime-local" name="tanggal_janji" id="tanggal_janji" class="form-control" required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary" style="border-radius: 9999px !important;">
                            <i class="fas fa-check me-1"></i> Buat Janji
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary" style="border-radius: 9999px !important;">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
