@extends('layout.master')

@section('title', 'Beranda Klinik Hewan')

@section('content')
@if ($role === 'admin')
    <div class="d-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important;">
            <i class="fas fa-chart-line me-2" style="color: #0d9488;"></i>Dashboard Admin
        </h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem; background: linear-gradient(135deg, #0d9488, #14b8a6);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small text-white-50 fw-bold text-uppercase mb-1">Total Klien</div>
                            <div class="fs-2 fw-bold">{{ $stats['totalKlien'] ?? 0 }}</div>
                        </div>
                        <div style="font-size: 2.5rem; opacity: 0.4;"><i class="fas fa-users"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem; background: linear-gradient(135deg, #3b82f6, #60a5fa);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small text-white-50 fw-bold text-uppercase mb-1">Total Dokter</div>
                            <div class="fs-2 fw-bold">{{ $stats['totalDokter'] ?? 0 }}</div>
                        </div>
                        <div style="font-size: 2.5rem; opacity: 0.4;"><i class="fas fa-user-md"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem; background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small text-white-50 fw-bold text-uppercase mb-1">Total Hewan</div>
                            <div class="fs-2 fw-bold">{{ $stats['totalHewan'] ?? 0 }}</div>
                        </div>
                        <div style="font-size: 2.5rem; opacity: 0.4;"><i class="fas fa-paw"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem; background: linear-gradient(135deg, #8b5cf6, #a78bfa);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small text-white-50 fw-bold text-uppercase mb-1">Janji Temu</div>
                            <div class="fs-2 fw-bold">{{ $stats['totalJanji'] ?? 0 }}</div>
                        </div>
                        <div style="font-size: 2.5rem; opacity: 0.4;"><i class="fas fa-calendar-check"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Aktivitas & Aksi Cepat Admin -->
    <div class="row">
        <!-- Tabel Janji Temu Terbaru -->
        <div class="col-xl-8 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem;">
                <div class="card-header bg-white border-0 pt-4 pb-0" style="border-radius: 1rem 1rem 0 0;">
                    <h6 class="fw-bold mb-0" style="color: #0f172a;"><i class="fas fa-calendar-alt me-2" style="color: #0d9488;"></i>Janji Temu Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Klien</th>
                                    <th>Hewan</th>
                                    <th>Tanggal & Waktu</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stats['recentJanji'] as $janji)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $janji->klien->nama ?? '-' }}</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold">{{ $janji->hewan->nama ?? '-' }}</div>
                                            <div class="text-muted small">{{ $janji->hewan->jenis ?? '' }}</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold">{{ \Carbon\Carbon::parse($janji->tanggal_janji)->format('d M Y') }}</div>
                                            <div class="text-muted small">{{ \Carbon\Carbon::parse($janji->tanggal_janji)->format('H:i') }}</div>
                                        </td>
                                        <td>
                                            @if ($janji->status == 'menunggu')
                                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Menunggu</span>
                                            @elseif ($janji->status == 'dijadwalkan')
                                                <span class="badge bg-info text-dark px-3 py-2 rounded-pill">Dijadwalkan</span>
                                            @elseif ($janji->status == 'selesai')
                                                <span class="badge bg-success px-3 py-2 rounded-pill">Selesai</span>
                                            @elseif ($janji->status == 'dibatalkan')
                                                <span class="badge bg-danger px-3 py-2 rounded-pill">Dibatalkan</span>
                                            @else
                                                <span class="badge bg-secondary px-3 py-2 rounded-pill">{{ ucfirst($janji->status) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            <i class="fas fa-folder-open mb-2" style="font-size: 2rem; opacity: 0.3;"></i><br>
                                            Belum ada aktivitas janji temu terbaru.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aksi Cepat Admin -->
        <div class="col-xl-4 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem;">
                <div class="card-header bg-white border-0 pt-4 pb-0" style="border-radius: 1rem 1rem 0 0;">
                    <h6 class="fw-bold mb-0" style="color: #0f172a;"><i class="fas fa-bolt me-2" style="color: #f59e0b;"></i>Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3 mt-2">
                        <a href="{{ route('admin.janji.index') }}" class="btn btn-light text-start py-3 px-4 fw-semibold shadow-sm" style="border-radius: 0.75rem; border: 1px solid #f1f5f9;">
                            <i class="fas fa-calendar-check me-3" style="color: #0d9488;"></i> Kelola Janji Temu
                        </a>
                        <a href="{{ route('admin.klien.index') }}" class="btn btn-light text-start py-3 px-4 fw-semibold shadow-sm" style="border-radius: 0.75rem; border: 1px solid #f1f5f9;">
                            <i class="fas fa-users me-3 text-primary"></i> Kelola Data Klien
                        </a>
                        <a href="{{ route('admin.dokter.index') }}" class="btn btn-light text-start py-3 px-4 fw-semibold shadow-sm" style="border-radius: 0.75rem; border: 1px solid #f1f5f9;">
                            <i class="fas fa-user-md me-3 text-info"></i> Kelola Data Dokter
                        </a>
                        <a href="{{ route('admin.hewan.index') }}" class="btn btn-light text-start py-3 px-4 fw-semibold shadow-sm" style="border-radius: 0.75rem; border: 1px solid #f1f5f9;">
                            <i class="fas fa-paw me-3 text-warning"></i> Kelola Data Hewan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif ($role === 'dokter')
    <div class="d-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="mb-0" style="border: none !important; padding-bottom: 0 !important;">
            <i class="fas fa-stethoscope me-2" style="color: #0d9488;"></i>Dashboard Dokter
        </h1>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem; background: linear-gradient(135deg, #0d9488, #14b8a6);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small text-white-50 fw-bold text-uppercase mb-1">Total Pasien (Hewan)</div>
                            <div class="fs-2 fw-bold">{{ $stats['totalPasien'] ?? 0 }}</div>
                        </div>
                        <div style="font-size: 2.5rem; opacity: 0.4;"><i class="fas fa-paw"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem; background: linear-gradient(135deg, #3b82f6, #60a5fa);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small text-white-50 fw-bold text-uppercase mb-1">Total Janji Temu</div>
                            <div class="fs-2 fw-bold">{{ $stats['totalJanji'] ?? 0 }}</div>
                        </div>
                        <div style="font-size: 2.5rem; opacity: 0.4;"><i class="fas fa-calendar-check"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem; background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small text-white-50 fw-bold text-uppercase mb-1">Menunggu Persetujuan</div>
                            <div class="fs-2 fw-bold">{{ $stats['janjiMenunggu'] ?? 0 }}</div>
                        </div>
                        <div style="font-size: 2.5rem; opacity: 0.4;"><i class="fas fa-clock"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Aktivitas & Aksi Cepat Dokter -->
    <div class="row">
        <!-- Tabel Janji Temu Terbaru -->
        <div class="col-xl-8 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem;">
                <div class="card-header bg-white border-0 pt-4 pb-0" style="border-radius: 1rem 1rem 0 0;">
                    <h6 class="fw-bold mb-0" style="color: #0f172a;"><i class="fas fa-calendar-alt me-2" style="color: #0d9488;"></i>Jadwal Janji Temu Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Klien</th>
                                    <th>Hewan</th>
                                    <th>Tanggal & Waktu</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stats['recentJanji'] as $janji)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $janji->klien->nama ?? '-' }}</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold">{{ $janji->hewan->nama ?? '-' }}</div>
                                            <div class="text-muted small">{{ $janji->hewan->jenis ?? '' }}</div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold">{{ \Carbon\Carbon::parse($janji->tanggal_janji)->format('d M Y') }}</div>
                                            <div class="text-muted small">{{ \Carbon\Carbon::parse($janji->tanggal_janji)->format('H:i') }}</div>
                                        </td>
                                        <td>
                                            @if ($janji->status == 'menunggu')
                                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Menunggu Persetujuan</span>
                                            @elseif ($janji->status == 'dijadwalkan')
                                                <span class="badge bg-info text-dark px-3 py-2 rounded-pill">Dijadwalkan</span>
                                            @elseif ($janji->status == 'selesai')
                                                <span class="badge bg-success px-3 py-2 rounded-pill">Selesai</span>
                                            @else
                                                <span class="badge bg-secondary px-3 py-2 rounded-pill">{{ ucfirst($janji->status) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            <i class="fas fa-calendar-times mb-2" style="font-size: 2rem; opacity: 0.3;"></i><br>
                                            Belum ada jadwal terbaru untuk Anda.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aksi Cepat Dokter -->
        <div class="col-xl-4 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem;">
                <div class="card-header bg-white border-0 pt-4 pb-0" style="border-radius: 1rem 1rem 0 0;">
                    <h6 class="fw-bold mb-0" style="color: #0f172a;"><i class="fas fa-bolt me-2" style="color: #f59e0b;"></i>Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3 mt-2">
                        <a href="{{ route('dokter.janji') }}" class="btn btn-light text-start py-3 px-4 fw-semibold shadow-sm" style="border-radius: 0.75rem; border: 1px solid #f1f5f9;">
                            <i class="fas fa-calendar-check me-3" style="color: #0d9488;"></i> Lihat Semua Jadwal
                        </a>
                        <a href="{{ route('dokter.pasien') }}" class="btn btn-light text-start py-3 px-4 fw-semibold shadow-sm" style="border-radius: 0.75rem; border: 1px solid #f1f5f9;">
                            <i class="fas fa-paw me-3 text-warning"></i> Daftar Pasien Saya
                        </a>
                        <a href="{{ route('profil.edit') }}" class="btn btn-light text-start py-3 px-4 fw-semibold shadow-sm" style="border-radius: 0.75rem; border: 1px solid #f1f5f9;">
                            <i class="fas fa-user-edit me-3 text-primary"></i> Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <!-- Hero Section -->
    <section class="py-5 text-center text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #0f766e 0%, #0d9488 30%, #14b8a6 60%, #5eead4 100%); border-radius: 1.5rem; margin-top: 1rem;">
        <!-- Floating paw decoration -->
        <i class="fas fa-paw position-absolute" style="top: 15%; left: 8%; font-size: 3rem; opacity: 0.1; animation: pc-float 6s ease-in-out infinite;"></i>
        <i class="fas fa-paw position-absolute" style="bottom: 15%; right: 8%; font-size: 2.5rem; opacity: 0.1; animation: pc-float 8s ease-in-out 1s infinite;"></i>

        <div class="container position-relative" style="z-index: 1;">
            <div class="mb-3" style="animation: pc-fadeInUp 0.6s ease-out both;">
                <span style="background: rgba(255,255,255,0.2); padding: 0.35rem 1rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">
                    <i class="fas fa-paw me-1"></i> Klinik Hewan Terpercaya
                </span>
            </div>
            <h1 class="display-5 fw-bold" style="animation: pc-fadeInUp 0.6s ease-out 0.1s both; border: none !important; color: white !important; padding-bottom: 0 !important; border-image: none !important; margin-bottom: 0.5rem !important;">
                Selamat Datang di PetCare
            </h1>
            <p class="lead mb-1" style="animation: pc-fadeInUp 0.6s ease-out 0.2s both; opacity: 0.9;">
                Kami membantu merawat peliharaanmu
            </p>
            <p class="mb-0" style="animation: pc-fadeInUp 0.6s ease-out 0.3s both; opacity: 0.8; max-width: 600px; margin: 0 auto;">
                Dari pemeriksaan rutin hingga perawatan khusus, kami di sini untuk memastikan hewan peliharaan Anda menjalani hidup yang bahagia dan sehat.
            </p>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <span style="display: inline-flex; align-items: center; gap: 0.4rem; font-size: 0.8rem; font-weight: 700; color: #0d9488; text-transform: uppercase; letter-spacing: 0.1em; padding: 0.35rem 1rem; background: #f0fdfa; border-radius: 9999px; border: 1px solid #ccfbf1;">
                    <i class="fas fa-hand-holding-heart"></i> Kenali Kami
                </span>
            </div>
            <div class="row justify-content-center text-center">

                <!-- Kartu Dokter Hewan -->
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow h-100 d-flex flex-column" style="border-radius: 1.5rem !important; overflow: hidden;">
                        <div style="overflow: hidden; height: 230px;">
                            <img src="{{ asset('img/dokter.jpg') }}" alt="Dokter Hewan" class="card-img-top" style="height: 230px; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><i class="fas fa-user-md me-1" style="color: #0d9488;"></i> Dokter Hewan</h5>
                            <p class="card-text">Kenali tim dokter hewan kami yang terampil dan berdedikasi untuk kesejahteraan hewan peliharaan Anda.</p>
                            <div class="mt-auto">
                                <a href="{{ url('/dataDokter') }}" class="btn btn-outline-primary btn-sm w-100" style="border-radius: 9999px !important;">
                                    <i class="fas fa-arrow-right me-1"></i> Lihat Dokter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kartu Hubungi Kami -->
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow h-100 d-flex flex-column" style="border-radius: 1.5rem !important; overflow: hidden;">
                        <div style="overflow: hidden; height: 230px;">
                            <img src="{{ asset('img/gambar-klinik.png') }}" alt="Hubungi Kami" class="card-img-top" style="height: 230px; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><i class="fas fa-map-marker-alt me-1" style="color: #0d9488;"></i> Hubungi Kami</h5>
                            <p class="card-text">Hubungi kami untuk pertanyaan atau jadwal janji temu bagi hewan peliharaan Anda.</p>
                            <div class="mt-auto">
                                <a href="https://maps.app.goo.gl/wx25TeRLgANTFELj6" class="btn btn-outline-primary btn-sm w-100" style="border-radius: 9999px !important;">
                                    <i class="fas fa-calendar-check me-1"></i> Reservasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 50%, #f0fdfa 100%); border-radius: 1.5rem; margin-bottom: 2rem;">
        <div class="container">
            <div class="text-center mb-4">
                <span style="display: inline-flex; align-items: center; gap: 0.4rem; font-size: 0.8rem; font-weight: 700; color: #0d9488; text-transform: uppercase; letter-spacing: 0.1em; padding: 0.35rem 1rem; background: white; border-radius: 9999px; border: 1px solid #ccfbf1;">
                    <i class="fas fa-hand-holding-medical"></i> Layanan
                </span>
            </div>
            <h2 class="text-center mb-5" style="font-weight: 800; color: #0f172a; border: none !important; padding-bottom: 0 !important; border-image: none !important;">
                Apa yang Kami Berikan
            </h2>
            <div class="row text-center justify-content-center">
                @php
                    $services = [
                        ['img' => 'perawaatan-darurat.webp', 'label' => 'Perawatan Darurat', 'icon' => 'fa-ambulance', 'color' => '#ef4444'],
                        ['img' => 'vaksinasi-hewan.jpg', 'label' => 'Layanan Vaksinasi', 'icon' => 'fa-syringe', 'color' => '#0d9488'],
                        ['img' => 'konsultasi.jpg', 'label' => 'Konseling Nutrisi', 'icon' => 'fa-apple-alt', 'color' => '#16a34a'],
                        ['img' => 'dog.jpg', 'label' => 'Konsultasi Perilaku', 'icon' => 'fa-comments', 'color' => '#7c3aed'],
                        ['img' => 'perawatan.jpeg', 'label' => 'Perawatan Hewan', 'icon' => 'fa-heart', 'color' => '#f59e0b']
                    ];
                @endphp

                @foreach ($services as $index => $service)
                    <div class="col-6 col-md-2 mb-4 d-flex">
                        <div class="bg-white p-3 w-100 d-flex flex-column align-items-center justify-content-start text-center" style="border-radius: 1rem; border: 1px solid #e2e8f0; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); cursor: default; box-shadow: 0 2px 8px rgba(0,0,0,0.04);"
                             onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 30px rgba(0,0,0,0.1)'; this.style.borderColor='#99f6e4';"
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'; this.style.borderColor='#e2e8f0';">
                            <div style="width: 40px; height: 40px; border-radius: 0.75rem; background: {{ $service['color'] }}15; display: flex; align-items: center; justify-content: center; margin-bottom: 0.5rem;">
                                <i class="fas {{ $service['icon'] }}" style="color: {{ $service['color'] }}; font-size: 1rem;"></i>
                            </div>
                            <div style="overflow: hidden; border-radius: 0.5rem; margin-bottom: 0.5rem;">
                                <img src="{{ asset('img/' . $service['img']) }}" alt="{{ $service['label'] }}" style="width: 150px; height: 150px; object-fit: cover; transition: transform 0.4s ease;">
                            </div>
                            <p class="mt-1 mb-0 fw-semibold" style="color: #0f172a; font-size: 0.85rem;">{{ $service['label'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection
