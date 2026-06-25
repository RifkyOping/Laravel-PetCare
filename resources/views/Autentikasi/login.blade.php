<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Login - PetCare Klinik Hewan" />
    <title>Login - PetCare</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet" />
    <link href="{{ asset('css/petcare-theme.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
        }

        .login-brand {
            text-align: center;
            margin-bottom: 2rem;
            animation: pc-fadeInUp 0.6s ease-out both;
        }

        .login-brand-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            color: white;
            animation: pc-float 4s ease-in-out infinite;
        }

        .login-brand h2 {
            color: white;
            font-weight: 800;
            font-size: 1.75rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .login-brand p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .login-card .card {
            border-radius: 1.5rem !important;
        }

        .login-card .card-header {
            padding: 1.5rem !important;
            border-radius: 1.5rem 1.5rem 0 0 !important;
        }

        .login-card .card-header h3 {
            font-size: 1.2rem !important;
            font-weight: 700 !important;
        }

        .login-card .card-body {
            padding: 2rem !important;
        }

        .login-card .form-floating {
            margin-bottom: 1rem;
        }

        .login-card .form-floating>.form-control {
            height: calc(3.5rem + 2px) !important;
            padding: 1.25rem 0.75rem 0.5rem !important;
            line-height: 1.5;
        }

        .login-card .form-floating>label {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            padding: 0.75rem 0.75rem !important;
            transform-origin: 0 0 !important;
            color: #94a3b8;
            pointer-events: none;
            transition: opacity 0.1s ease-in-out, transform 0.1s ease-in-out;
        }

        .login-card .form-floating>.form-control:focus~label,
        .login-card .form-floating>.form-control:not(:placeholder-shown)~label {
            transform: scale(0.85) translateY(-0.75rem) translateX(0.15rem) !important;
            opacity: 0.65;
        }

        .login-card .btn-primary {
            padding: 0.65rem 1.5rem;
            border-radius: 9999px !important;
        }

        .login-card .card-footer {
            border-radius: 0 0 1.5rem 1.5rem !important;
            padding: 1rem !important;
        }

        .login-card .card-footer a {
            color: var(--pc-primary-600);
            font-weight: 600;
        }

        .login-card .card-footer a:hover {
            color: var(--pc-primary-700);
        }

        /* Paw decorations */
        .paw-deco {
            position: fixed;
            color: rgba(255, 255, 255, 0.05);
            z-index: 0;
            font-size: 4rem;
        }

        .paw-deco-1 {
            top: 10%;
            left: 10%;
            animation: pc-float 6s ease-in-out infinite;
        }

        .paw-deco-2 {
            bottom: 10%;
            right: 10%;
            animation: pc-float 8s ease-in-out 1s infinite;
            font-size: 3rem;
        }

        .paw-deco-3 {
            top: 50%;
            right: 5%;
            animation: pc-float 7s ease-in-out 2s infinite;
            font-size: 2.5rem;
        }
    </style>
</head>

<body class="bg-primary">
    <!-- Preloader -->
    <div id="pc-preloader">
        <div class="pc-spinner">
            <img src="{{ asset('img/logo.png') }}" alt="Loading...">
        </div>
    </div>
    <!-- Paw decorations -->
    <i class="fas fa-paw paw-deco paw-deco-1"></i>
    <i class="fas fa-paw paw-deco paw-deco-2"></i>
    <i class="fas fa-paw paw-deco paw-deco-3"></i>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-brand">
                <div class="login-brand-icon" style="background: transparent; border: none;">
                    <img src="{{ asset('img/logo.png') }}" alt="PetCare Logo" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
                <p>Masuk ke akun Anda</p>
            </div>

            @if (session()->has('Error'))
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert"
                    style="animation: pc-slideDown 0.4s ease-out both;">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('Error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif

            <div class="card shadow-lg border-0">
                <div class="card-header">
                    <h3 class="text-center my-1">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                                type="email" placeholder="name@gmail.com" name="email" autofocus required
                                value="{{ old('email') }}">
                            <label for="inputEmail"><i class="fas fa-envelope me-2"></i>Email</label>
                            @error('email')
                                <div style="color: #ef4444; font-size: 0.85rem; margin-top: 0.3rem;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 position-relative">
                            <input class="form-control" id="inputPassword" type="password" placeholder="Password"
                                name="password" required>
                            <label for="inputPassword"><i class="fas fa-lock me-2"></i>Password</label>
                            <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                onclick="togglePassword()" style="cursor: pointer; z-index: 5;">
                                <i class="fas fa-eye" id="toggleIcon" style="color: var(--pc-gray-400);"></i>
                            </span>
                        </div>
                        <div class="mt-4 mb-0">
                            <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm" style="padding: 0.8rem; font-size: 1.1rem;">
                                <i class="fas fa-sign-in-alt me-2"></i> Login
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small">
                        Belum punya akun?
                        <a href="{{ route('regis') }}">Daftar Sekarang!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('inputPassword');
            const icon = document.getElementById('toggleIcon');
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        }
    </script>
    <!-- Preloader Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const preloader = document.getElementById('pc-preloader');
            let loaderTimeout;

            // Tampilkan saat form disubmit (jika lebih dari 500ms)
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (preloader && !e.defaultPrevented) {
                        loaderTimeout = setTimeout(() => {
                            preloader.classList.add('show');
                        }, 500); // Muncul jika loading lebih dari 500ms
                    }
                });
            });

            // Sembunyikan kembali jika user kembali lewat tombol back (bfcache)
            window.addEventListener('pageshow', function(event) {
                if (event.persisted && preloader) {
                    clearTimeout(loaderTimeout);
                    preloader.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>