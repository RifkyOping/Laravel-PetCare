@extends('layout.master')

@section('title', 'Beranda Klinik Hewan')

@section('content')
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
@endsection
