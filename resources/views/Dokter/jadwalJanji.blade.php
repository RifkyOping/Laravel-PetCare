@extends('layout.master')

@section('title', 'Jadwal Janji Temu')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important; border-image: none !important;">
        <i class="fas fa-calendar-check me-2" style="color: #0d9488;"></i>Jadwal Janji Temu
    </h1>
</div>

@if($data->isEmpty())
    <div class="text-center py-5">
        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #f0fdfa, #ccfbf1); border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.25rem;">
            <i class="fas fa-calendar-times" style="font-size: 2rem; color: #0d9488;"></i>
        </div>
        <h5 style="font-weight: 700; color: #0f172a;">Belum Ada Jadwal</h5>
        <p style="color: #64748b; max-width: 400px; margin: 0 auto;">Saat ini tidak ada pasien yang membuat janji temu dengan Anda.</p>
    </div>
@else
    <div class="row">
        @foreach ($data as $d)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-center" style="border-radius: 1.5rem !important; border: 1px solid #e2e8f0 !important; overflow: hidden; position: relative;">
                    {{-- Top accent bar --}}
                    <div style="height: 4px; background: linear-gradient(90deg, #0d9488, #5eead4, #f59e0b);"></div>

                    <div class="card-body p-4">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #f0fdfa, #ccfbf1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                            <i class="fas fa-calendar-alt" style="font-size: 1.2rem; color: #0d9488;"></i>
                        </div>
                        <h5 class="mb-3" style="font-weight: 700; color: #0f172a;">Pasien Baru</h5>
                        <div style="text-align: left; background: #f8fafc; border-radius: 0.75rem; padding: 1rem; margin-bottom: 1rem;">
                            <p class="mb-2" style="font-size: 0.9rem; color: #475569;">
                                <i class="fas fa-user me-2" style="color: #0d9488; width: 16px;"></i>
                                <strong>Klien:</strong> {{ optional($d->klien)->nama ?? '-' }}
                            </p>
                            <p class="mb-2" style="font-size: 0.9rem; color: #475569;">
                                <i class="fas fa-paw me-2" style="color: #f59e0b; width: 16px;"></i>
                                <strong>Hewan:</strong> {{ optional($d->hewan)->nama ?? '-' }}
                            </p>
                            <p class="mb-0" style="font-size: 0.9rem; color: #475569;">
                                <i class="fas fa-clock me-2" style="color: #7c3aed; width: 16px;"></i>
                                <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($d->tanggal_janji)->format('d M Y H:i') }}
                            </p>
                        </div>
                        <span class="badge py-2 px-3 fs-6
                            @if($d->status == 'menunggu') bg-secondary
                            @elseif($d->status == 'dijadwalkan') bg-info
                            @elseif($d->status == 'selesai') bg-success
                            @elseif($d->status == 'dibatalkan') bg-danger
                            @endif
                        ">
                            <i class="fas
                                @if($d->status == 'menunggu') fa-hourglass-half
                                @elseif($d->status == 'dijadwalkan') fa-calendar-check
                                @elseif($d->status == 'selesai') fa-check-circle
                                @elseif($d->status == 'dibatalkan') fa-times-circle
                                @endif me-1"></i>
                            {{ ucfirst($d->status) }}
                        </span>

                        @if($d->status == 'menunggu')
                        <div class="mt-3">
                            <form action="{{ route('dokter.janji.setujui', $d->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-info text-white px-4" style="border-radius: 9999px; background: linear-gradient(135deg, #0ea5e9, #38bdf8); border: none;">
                                    <i class="fas fa-check-circle me-1"></i> Setujui Janji
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
