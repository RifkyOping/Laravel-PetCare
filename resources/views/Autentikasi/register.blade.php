<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - PetCare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/petcare-theme.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 50%, #f0fdfa 100%);
            min-height: 100vh;
        }

        .register-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2.5rem 1rem;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2.5rem;
            animation: pc-fadeInUp 0.6s ease-out both;
        }

        .register-brand-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #0d9488, #14b8a6);
            border-radius: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            color: white;
            box-shadow: 0 8px 25px rgba(13, 148, 136, 0.3);
            animation: pc-float 4s ease-in-out infinite;
        }

        .register-header h2 {
            font-weight: 800;
            color: #0f172a;
            font-size: 1.75rem;
        }

        .register-header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .register-card {
            animation: pc-fadeInUp 0.5s ease-out both;
        }

        .register-card .card {
            border: none !important;
            border-radius: 1.5rem !important;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08) !important;
            overflow: hidden;
        }

        .register-card .card-header {
            padding: 1.25rem 1.5rem !important;
            background: linear-gradient(135deg, #0d9488, #14b8a6) !important;
            color: white !important;
        }

        .register-card .card-header h5 {
            font-size: 1.05rem !important;
            margin: 0;
            color: white;
        }

        .register-card .card-body {
            padding: 2rem !important;
        }

        .register-card .form-control {
            padding: 0.7rem 1rem !important;
        }

        .register-card label {
            font-weight: 600;
            color: #334155;
            font-size: 0.88rem;
            margin-bottom: 0.3rem;
        }

        .register-card .btn {
            padding: 0.7rem 1.5rem;
            border-radius: 9999px !important;
            font-size: 0.95rem;
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
            animation: pc-fadeInUp 0.6s ease-out 0.3s both;
        }

        .back-link a {
            color: #0d9488;
            font-weight: 600;
            text-decoration: none;
        }

        .back-link a:hover {
            color: #0f766e;
        }
    </style>
</head>
<body>
<div class="register-container">
    <div class="register-header">
        <div class="register-brand-icon">
            <i class="fas fa-paw"></i>
        </div>
        <h2>Daftar Akun PetCare</h2>
        <p>Lengkapi data Anda di bawah ini</p>
    </div>

    <div id="form-pengguna">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="register-card">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5><i class="fas fa-user me-2"></i>Form Registrasi</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('regis.submit') }}">
                                @csrf
                                <input type="hidden" name="role" value="klien">
                                <div class="mb-3">
                                    <label for="user_name"><i class="fas fa-id-card me-1"></i> Nama Lengkap</label>
                                    <input type="text" class="form-control" id="user_name" name="nama" placeholder="Masukkan nama lengkap" required>
                                </div>
                                <div class="mb-3">
                                    <label for="user_email"><i class="fas fa-envelope me-1"></i> Email</label>
                                    <input type="email" class="form-control" id="user_email" name="email" placeholder="nama@email.com" required>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="user_password"><i class="fas fa-lock me-1"></i> Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control pe-5" id="user_password" name="password" placeholder="Buat password" required>
                                        <span onclick="togglePassword()" class="position-absolute top-50 end-0 translate-middle-y pe-3" style="cursor: pointer;">
                                            <i class="fas fa-eye" id="toggleIcon" style="color: #94a3b8;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telepon"><i class="fas fa-phone me-1"></i> No Telepon</label>
                                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="08xxxxxxxxxx" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Alamat"><i class="fas fa-map-marker-alt me-1"></i> Alamat</label>
                                    <input type="text" class="form-control" id="Alamat" name="alamat" placeholder="Alamat lengkap" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-2">
                                    <i class="fas fa-user-plus me-1"></i> Daftar Sekarang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="back-link">
        <p>Sudah punya akun? <a href="{{ route('login') }}">Login Disini</a></p>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('user_password');
        const icon = document.getElementById('toggleIcon');
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    }
</script>
</body>
</html>