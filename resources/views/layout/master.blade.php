<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="PetCare - Klinik Hewan Terpercaya" />
    <meta name="author" content="PetCare" />
    <title>@yield('title') - PetCare</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- PetCare Theme -->
    <link href="{{ asset('css/petcare-theme.css') }}" rel="stylesheet" />

    @stack('styles')

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">
    <!-- Top Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="padding-left: 0;">
        <!-- Brand Section -->
        <a class="d-flex align-items-center gap-2 ps-4 pe-4 m-0" href="{{ url('/dashboard') }}" style="width: auto; text-decoration: none;">
            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #14b8a6, #5eead4); border-radius: 0.6rem; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-paw" style="color: white; font-size: 0.9rem;"></i>
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
</body>
</html>
