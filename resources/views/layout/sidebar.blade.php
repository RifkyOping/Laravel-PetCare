<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav" style="padding-top: 0.5rem;">
            <div style="padding: 0 0.75rem;">
                <div style="height: 1px; background: rgba(255,255,255,0.08); margin-bottom: 0.75rem;"></div>
            </div>

            <a class="nav-link" href="{{ url('/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Beranda
            </a>

            @if (Auth::user()->role === 'klien')
                <a class="nav-link collapsed" href="{{ route('lihat.dokter') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                Lihat Dokter

            @elseif(Auth::user()->role === 'dokter')
                <a class="nav-link collapsed" href="{{ route('dokter.pasien') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-paw"></i></div>
                Lihat Pasien
            @endif

            @if(Auth::user()->role === 'dokter')
            <a class="nav-link collapsed" href="{{ route('dokter.janji') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                Lihat Jadwal Janji Temu
            @endif

            @if(Auth::user()->role === 'klien')
            <a class="nav-link collapsed" href="{{ route('janji.lihat') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                Lihat Jadwal Janji Temu
            @endif

            @if(Auth::user()->role === 'admin')
                <a class="nav-link collapsed" href="{{ route('admin.dokter.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                Kelola Data Dokter

                <a class="nav-link collapsed" href="{{ route('admin.klien.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Kelola Data Klien

                <a class="nav-link collapsed" href="{{ route('admin.hewan.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-paw"></i></div>
                Kelola Data Peliharaan

                <a class="nav-link collapsed" href="{{ route('admin.janji.index') }}">
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
                        <a class="nav-link" href="{{ route('hewan.jenis', ['jenis' => $p->jenis]) }}">
                            <i class="fas fa-chevron-right me-1" style="font-size: 0.55rem; opacity: 0.5;"></i>
                            {{ $p->jenis }}
                        </a>
                    @empty
                        <a class="nav-link" style="opacity: 0.5;">
                            <i class="fas fa-info-circle me-1" style="font-size: 0.7rem;"></i>
                            Tidak ada peliharaan
                        </a>
                    @endforelse
                    <a class="nav-link" href="{{ route('hewan.tambah') }}" style="color: #5eead4 !important;">
                        <i class="fas fa-plus-circle me-1"></i> Tambah Baru
                    </a>
                </nav>
            </div>

            <div style="padding: 0 0.75rem; margin-top: 0.5rem;">
                <div style="height: 1px; background: rgba(255,255,255,0.08); margin-bottom: 0.5rem;"></div>
            </div>

            <a class="nav-link" href="{{ route('profile.show') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                Profil
            </a>
            <a class="nav-link" href="{{ route('dashboard') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #f87171 !important;">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt" style="color: #f87171 !important;"></i></div>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div style="display: flex; align-items: center; gap: 0.6rem;">
            <div style="width: 30px; height: 30px; background: linear-gradient(135deg, #14b8a6, #5eead4); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-user" style="color: white; font-size: 0.65rem;"></i>
            </div>
            <div>
                <div style="font-size: 0.75rem; color: rgba(255,255,255,0.6);">Logged in as</div>
                <div style="font-size: 0.8rem; color: white; font-weight: 700; text-transform: capitalize;">{{ Auth::user()->role }}</div>
            </div>
        </div>
    </div>
</nav>
