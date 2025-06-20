<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Beranda
            </a>

            {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}
            @if (Auth::user()->role === 'klien')
                <a class="nav-link collapsed" href="{{ route('lihat.dokter') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                Lihat Dokter

            @elseif(Auth::user()->role === 'dokter')
                <a class="nav-link collapsed" href="{{ url('/dataDokter') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                Lihat Pasien

            @endif

            @if(Auth::user()->role === 'dokter')
            <a class="nav-link collapsed" href="{{ route('lihat.dokter') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                Lihat Jadwal Janji Temu
            @endif

            @if(Auth::user()->role === 'klien')
            <a class="nav-link collapsed" href="{{ route('janji.lihat') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                Lihat Jadwal Janji Temu
            @endif

            @if(Auth::user()->role === 'admin')
                <a class="nav-link collapsed" href="{{ route('kelola.dokter') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                Kelola Data Dokter

                <a class="nav-link collapsed" href="{{ route('kelola.klien') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Kelola Data Klien

                <a class="nav-link collapsed" href="{{ route('kelola.hewan') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-paw"></i></div>
                Kelola Data Peliharaan

                <a class="nav-link collapsed" href="{{ route('admin.janji.lihat') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-clock"></i></div>
                Kelola Data Janji Temu
            @endif
            </a>

            @if (Auth::user()->role === 'klien')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-cat"></i></div>
                    Peliharaan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
            @endif

            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    @forelse ($jenisPeliharaan as $p)
                        <a class="nav-link" href="{{ route('hewan.jenis', ['jenis' => $p->jenis]) }}">{{ $p->jenis }}</a>
                    @empty
                        <a class="nav-link">Tidak ada peliharaan</a>
                    @endforelse
                    <a class="nav-link" href="{{ route('hewan.tambah') }}"><i class="fas fa-plus"></i></a>
                </nav>
            </div>
            <a class="nav-link" href="{{ route('profile.show') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                Profil
            </a>
            <a class="nav-link" href="{{ route('dashboard') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as : {{ Auth::user()->role }}</div>
    </div>
</nav>
