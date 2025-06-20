@extends('layout.master')

@section('title', 'Beranda Klinik Hewan')

@section('content')
    <!-- Hero Section -->
    <section class="py-5 text-center text-white" style="background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%); width: 100vw; margin-left: calc(-50vw + 50%);">
        <div class="container">
            <h1 class="display-4 fw-bold"> Selamat Datang di Pet Care</h1>
            <p class="lead">Kami membantu merawat peliharaanmu</p>
            <p>Dari pemeriksaan rutin hingga perawatan khusus, kami di sini untuk memastikan hewan peliharaan Anda menjalani hidup yang bahagia dan sehat.</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center">

                <!-- Kartu Dokter Hewan -->
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow h-100 d-flex flex-column">
                        <img src="{{ asset('img/dokter.jpg') }}" alt="Dokter Hewan" class="card-img-top" style="height: 230px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Dokter Hewan</h5>
                            <p class="card-text">Kenali tim dokter hewan kami yang terampil dan berdedikasi untuk kesejahteraan hewan peliharaan Anda.</p>
                            <div class="mt-auto">
                                <a href="{{ url('/dataDokter') }}" class="btn btn-outline-primary btn-sm w-100">Lihat Dokter</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kartu Hubungi Kami -->
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow h-100 d-flex flex-column">
                        <img src="{{ asset('img/gambar-klinik.png') }}" alt="Hubungi Kami" class="card-img-top" style="height: 230px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Hubungi Kami</h5>
                            <p class="card-text">Hubungi kami untuk pertanyaan atau jadwal janji temu bagi hewan peliharaan Anda.</p>
                            <div class="mt-auto">
                                <a href="https://maps.app.goo.gl/wx25TeRLgANTFELj6" class="btn btn-outline-primary btn-sm w-100">Reservasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5" style="background: linear-gradient(135deg, #FDEB71 0%, #F8D800 100%);">
    <div class="container">
        <h2 class="text-center mb-5 text-dark">Apa yang Kami Berikan</h2>
        <div class="row text-center justify-content-center">
            @php
                $services = [
                    ['img' => 'perawaatan-darurat.webp', 'label' => 'Perawatan Darurat'],
                    ['img' => 'vaksinasi-hewan.jpg', 'label' => 'Layanan Vaksinasi'],
                    ['img' => 'konsultasi.jpg', 'label' => 'Konseling Nutrisi'],
                    ['img' => 'dog.jpg', 'label' => 'Konsultasi Perilaku'],
                    ['img' => 'perawatan.jpeg', 'label' => 'Perawatan Hewan']
                ];
            @endphp

            @foreach ($services as $service)
                <div class="col-6 col-md-2 mb-4 d-flex">
                    <div class="bg-white rounded shadow-sm p-3 w-100 d-flex flex-column align-items-center justify-content-start text-center">
                        <img src="{{ asset('img/' . $service['img']) }}" alt="{{ $service['label'] }}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 5px" class="mb-1">
                        <p class="mt-1 mb-0 text-dark fw-semibold">{{ $service['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
