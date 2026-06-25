<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="PetCare - Klinik Hewan Terpercaya" />
    <meta name="author" content="PetCare" />
    <title>@yield('title') - PetCare</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- PetCare Theme -->
    <link href="{{ asset('css/petcare-theme.css') }}" rel="stylesheet" />

    {{-- Inline preloader CSS — available immediately --}}
    <style>
        #pc-preloader{position:fixed;top:0;left:0;width:100%;height:100%;background:var(--pc-gray-50, #f8fafc);z-index:99999;display:flex;justify-content:center;align-items:center;opacity:1;visibility:visible;transition:opacity .4s ease,visibility .4s ease}
        body.bg-primary #pc-preloader{background:linear-gradient(135deg,#115e59 0%,#0f766e 30%,#0d9488 60%,#14b8a6 100%)}
        #pc-preloader.hide{opacity:0;visibility:hidden}
        .pc-spinner{width:90px;height:90px;position:relative;animation:pc-pulse 1.5s infinite ease-in-out;border-radius:50%;background:#fff;display:flex;justify-content:center;align-items:center;box-shadow:0 10px 30px rgba(13,148,136,.2)}
        .pc-spinner img{width:60px;height:60px;object-fit:contain;animation:pc-float 3s ease-in-out infinite}
    </style>

    @stack('styles')

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous" defer></script>

</head>
<body class="sb-nav-fixed">
    <!-- Preloader -->
    <div id="pc-preloader">
        <div class="pc-spinner">
            <img src="{{ asset('img/logo.png') }}" alt="Loading...">
        </div>
    </div>
    <!-- Top Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="padding-left: 0;">
        <!-- Brand Section -->
        <a class="d-flex align-items-center gap-2 ps-4 pe-4 m-0" href="{{ url('/dashboard') }}" style="width: auto; text-decoration: none;">
            <div style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('img/logo.png') }}" alt="PetCare Logo" style="max-width: 100%; max-height: 100%; object-fit: contain;">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <div style="color: white; font-weight: 800; font-size: 1rem; line-height: 1.2;">PetCare</div>
                <div style="color: rgba(255,255,255,0.7); font-size: 0.65rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Klinik Hewan</div>
            </div>
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" style="color: rgba(255,255,255,0.7);"><i class="fas fa-bars fs-5"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
    </nav>

    <!-- Layout -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layout.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3 pc-animate" role="alert" id="pc-alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3 pc-animate" role="alert" id="pc-alert-error">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 1rem; border: none; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                <div class="modal-header" style="background: linear-gradient(135deg, #14b8a6, #5eead4); color: white; border-bottom: none; padding: 1.5rem;">
                    <h5 class="modal-title fw-bold" id="logoutModalLabel">
                        <i class="fas fa-sign-out-alt me-2"></i>Konfirmasi Logout
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <div style="width: 70px; height: 70px; background: #fee2e2; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                        <i class="fas fa-door-open" style="font-size: 2rem; color: #ef4444;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Yakin Ingin Keluar?</h5>
                    <p class="text-muted mb-0">Sesi Anda saat ini akan diakhiri dan Anda harus login kembali untuk mengakses sistem.</p>
                </div>
                <div class="modal-footer" style="border-top: none; padding: 1.5rem; justify-content: center; gap: 1rem;">
                    <button type="button" class="btn btn-light fw-bold px-4" data-bs-dismiss="modal" style="border-radius: 0.5rem; color: #64748b;">Batal</button>
                    <button type="button" class="btn btn-danger fw-bold px-4" onclick="document.getElementById('logout-form').submit();" style="border-radius: 0.5rem; background-color: #ef4444; border-color: #ef4444; color: white;">
                        <i class="fas fa-sign-out-alt me-2"></i>Ya, Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>

    @stack('scripts')

    <!-- PetCare Animations -->
    <script>
        // Auto-dismiss alerts after 4 seconds with fade
        document.querySelectorAll('.alert-dismissible').forEach(alert => {
            setTimeout(() => {
                alert.style.transition = 'all 0.5s ease-out';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-15px)';
                setTimeout(() => alert.remove(), 500);
            }, 4000);
        });

        // Stagger animation for card grids
        document.querySelectorAll('.row > [class*="col-"]').forEach((col, index) => {
            const card = col.querySelector('.card');
            if (card) {
                card.style.animationDelay = `${0.05 + index * 0.08}s`;
            }
        });
    </script>
    <!-- Preloader Script -->
    <script>
        // Hide preloader as soon as page is ready
        window.addEventListener('load', function() {
            var preloader = document.getElementById('pc-preloader');
            if (preloader) {
                setTimeout(function() {
                    preloader.classList.add('hide');
                    setTimeout(function() { preloader.remove(); }, 500);
                }, 300);
            }
        });

        // Show preloader on form submit
        document.addEventListener("DOMContentLoaded", function() {
            var preloader = document.getElementById('pc-preloader');
            document.querySelectorAll('form').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    if (preloader && !e.defaultPrevented) {
                        preloader.classList.remove('hide');
                        preloader.style.opacity = '1';
                        preloader.style.visibility = 'visible';
                    }
                });
            });

            // Handle bfcache
            window.addEventListener('pageshow', function(event) {
                if (event.persisted && preloader) {
                    preloader.classList.add('hide');
                }
            });
        });
    </script>
</body>
</html>
