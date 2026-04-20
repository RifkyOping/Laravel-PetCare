<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PetCare - Klinik Hewan Terpercaya</title>
    <meta name="description" content="PetCare - Klinik hewan terpercaya dengan dokter berpengalaman. Dari pemeriksaan rutin hingga perawatan khusus untuk hewan peliharaan Anda.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        /* ========== CSS RESET & VARIABLES ========== */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #0d9488;
            --primary-light: #5eead4;
            --primary-dark: #0f766e;
            --primary-50: #f0fdfa;
            --primary-100: #ccfbf1;
            --primary-200: #99f6e4;
            --primary-500: #14b8a6;
            --primary-600: #0d9488;
            --primary-700: #0f766e;
            --primary-800: #115e59;
            --primary-900: #134e4a;
            --accent: #f59e0b;
            --accent-light: #fbbf24;
            --dark: #0f172a;
            --dark-light: #1e293b;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --white: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-2xl: 1.5rem;
            --radius-full: 9999px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--gray-700);
            line-height: 1.6;
            overflow-x: hidden;
            background: var(--white);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            display: block;
        }

        /* ========== ANIMATIONS ========== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-40px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(40px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes pulse-soft {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes blob {
            0%   { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50%  { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
            100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
        }

        @keyframes countUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        @keyframes pawPrint {
            0%, 100% { opacity: 0.1; transform: scale(0.8) rotate(-15deg); }
            50% { opacity: 0.25; transform: scale(1) rotate(0deg); }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ========== NAVBAR ========== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1rem 0;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
            padding: 0.6rem 0;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--white);
            transition: color 0.3s;
        }

        .navbar.scrolled .navbar-brand {
            color: var(--primary-700);
        }

        .navbar-brand .paw-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-light));
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(13, 148, 136, 0.3);
        }

        .navbar.scrolled .navbar-brand .paw-icon {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-500));
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link {
            padding: 0.5rem 1.25rem;
            border-radius: var(--radius-full);
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s;
            color: rgba(255, 255, 255, 0.85);
            border: 1.5px solid transparent;
        }

        .navbar.scrolled .nav-link {
            color: var(--gray-600);
        }

        .nav-link:hover {
            color: var(--white);
            background: rgba(255, 255, 255, 0.15);
        }

        .navbar.scrolled .nav-link:hover {
            color: var(--primary-600);
            background: var(--primary-50);
        }

        .nav-link-primary {
            background: var(--white) !important;
            color: var(--primary-700) !important;
            font-weight: 600;
            border: 1.5px solid transparent;
        }

        .nav-link-primary:hover {
            background: var(--primary-100) !important;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .navbar.scrolled .nav-link-primary {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-500)) !important;
            color: var(--white) !important;
        }

        .navbar.scrolled .nav-link-primary:hover {
            background: linear-gradient(135deg, var(--primary-700), var(--primary-600)) !important;
            box-shadow: 0 4px 15px rgba(13, 148, 136, 0.3);
        }

        /* ========== HERO SECTION ========== */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #0f766e 0%, #0d9488 30%, #14b8a6 60%, #5eead4 100%);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -30%;
            width: 80%;
            height: 160%;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
            animation: blob 15s ease-in-out infinite;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -20%;
            width: 60%;
            height: 80%;
            background: radial-gradient(circle, rgba(245,158,11,0.1) 0%, transparent 60%);
            animation: blob 12s ease-in-out infinite reverse;
        }

        /* Paw print decorations */
        .paw-decoration {
            position: absolute;
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.06);
            z-index: 1;
        }
        .paw-1 { top: 15%; right: 10%; animation: pawPrint 8s ease-in-out infinite; font-size: 3rem; }
        .paw-2 { top: 60%; right: 5%; animation: pawPrint 10s ease-in-out 2s infinite; font-size: 2.5rem; }
        .paw-3 { bottom: 15%; left: 5%; animation: pawPrint 9s ease-in-out 1s infinite; font-size: 3.5rem; }
        .paw-4 { top: 25%; left: 15%; animation: pawPrint 7s ease-in-out 3s infinite; font-size: 2rem; }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 8rem 2rem 4rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-content {
            animation: fadeInLeft 1s ease-out;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 1rem 0.4rem 0.6rem;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-full);
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--white);
            margin-bottom: 1.5rem;
        }

        .hero-badge .badge-dot {
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            animation: pulse-soft 2s infinite;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--white);
            line-height: 1.15;
            margin-bottom: 1.25rem;
            letter-spacing: -0.02em;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-desc {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.85);
            max-width: 500px;
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 1.75rem;
            border-radius: var(--radius-full);
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn-white {
            background: var(--white);
            color: var(--primary-700);
            box-shadow: var(--shadow-lg);
        }

        .btn-white:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            background: var(--gray-50);
        }

        .btn-outline-white {
            background: transparent;
            color: var(--white);
            border: 2px solid rgba(255, 255, 255, 0.4);
        }

        .btn-outline-white:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.7);
            transform: translateY(-2px);
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hero-stat {
            text-align: center;
        }

        .hero-stat-number {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--white);
        }

        .hero-stat-label {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
        }

        .hero-image-wrapper {
            position: relative;
            animation: fadeInRight 1s ease-out 0.3s both;
        }

        .hero-image {
            position: relative;
            z-index: 2;
        }

        .hero-image img {
            width: 100%;
            max-width: 520px;
            border-radius: 2rem;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            animation: float 6s ease-in-out infinite;
        }

        .hero-image-blob {
            position: absolute;
            width: 120%;
            height: 120%;
            top: -10%;
            left: -10%;
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.2), rgba(94, 234, 212, 0.2));
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation: blob 10s ease-in-out infinite;
            z-index: 1;
        }

        /* Floating cards on hero */
        .floating-card {
            position: absolute;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: var(--radius-xl);
            padding: 0.9rem 1.2rem;
            box-shadow: var(--shadow-xl);
            z-index: 3;
            animation: float 5s ease-in-out infinite;
        }

        .floating-card-1 {
            top: 10%;
            right: -5%;
            animation-delay: 1s;
        }

        .floating-card-2 {
            bottom: 15%;
            left: -5%;
            animation-delay: 2s;
        }

        .floating-card-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }

        .floating-card-text {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--dark);
        }

        .floating-card-sub {
            font-size: 0.65rem;
            color: var(--gray-500);
        }

        /* ========== SERVICES SECTION ========== */
        .section {
            padding: 6rem 2rem;
        }

        .section-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--primary-600);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.75rem;
            padding: 0.35rem 1rem;
            background: var(--primary-50);
            border-radius: var(--radius-full);
            border: 1px solid var(--primary-100);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--gray-500);
            max-width: 560px;
            margin: 0 auto;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .service-card {
            background: var(--white);
            border-radius: var(--radius-2xl);
            padding: 2rem;
            border: 1px solid var(--gray-100);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-500), var(--primary-light));
            transform: scaleX(0);
            transition: transform 0.4s ease;
            transform-origin: left;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-100);
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.25rem;
            transition: transform 0.3s;
        }

        .service-card:hover .service-icon {
            transform: scale(1.1);
        }

        .service-icon-teal {
            background: linear-gradient(135deg, var(--primary-50), var(--primary-100));
            color: var(--primary-600);
        }

        .service-icon-amber {
            background: linear-gradient(135deg, #fffbeb, #fef3c7);
            color: #d97706;
        }

        .service-icon-rose {
            background: linear-gradient(135deg, #fff1f2, #fecdd3);
            color: #e11d48;
        }

        .service-icon-purple {
            background: linear-gradient(135deg, #f5f3ff, #ede9fe);
            color: #7c3aed;
        }

        .service-icon-blue {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            color: #2563eb;
        }

        .service-icon-green {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            color: #16a34a;
        }

        .service-card h3 {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .service-card p {
            font-size: 0.9rem;
            color: var(--gray-500);
            line-height: 1.6;
        }

        /* ========== ABOUT SECTION ========== */
        .about-section {
            background: var(--gray-50);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-image-wrapper {
            position: relative;
        }

        .about-image {
            border-radius: var(--radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .about-image img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .about-accent-box {
            position: absolute;
            bottom: -1.5rem;
            right: -1.5rem;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-light));
            padding: 1.25rem 1.75rem;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            color: var(--white);
            z-index: 2;
        }

        .about-accent-box .accent-number {
            font-size: 2rem;
            font-weight: 800;
        }

        .about-accent-box .accent-text {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .about-content h2 {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
        }

        .about-content p {
            color: var(--gray-500);
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .about-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .about-features li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 0;
            font-weight: 500;
            color: var(--gray-700);
        }

        .about-features li .check-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--primary-50);
            color: var(--primary-600);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            flex-shrink: 0;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-500));
            color: var(--white);
            box-shadow: 0 4px 15px rgba(13, 148, 136, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 148, 136, 0.4);
        }

        /* ========== STATS SECTION ========== */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-800), var(--primary-700), var(--primary-600));
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            position: relative;
            z-index: 1;
        }

        .stat-item {
            text-align: center;
            padding: 2rem 1rem;
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            margin: 0 auto 1rem;
            background: rgba(255, 255, 255, 0.15);
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: var(--primary-light);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--white);
            line-height: 1;
            margin-bottom: 0.4rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
        }

        /* ========== TESTIMONIALS ========== */
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .testimonial-card {
            background: var(--white);
            border-radius: var(--radius-2xl);
            padding: 2rem;
            border: 1px solid var(--gray-100);
            transition: all 0.3s;
            position: relative;
        }

        .testimonial-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .testimonial-stars {
            display: flex;
            gap: 0.2rem;
            margin-bottom: 1rem;
            color: var(--accent);
            font-size: 0.9rem;
        }

        .testimonial-text {
            font-size: 0.95rem;
            color: var(--gray-600);
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .testimonial-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-100), var(--primary-200));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
            color: var(--primary-700);
        }

        .testimonial-name {
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--dark);
        }

        .testimonial-pet {
            font-size: 0.8rem;
            color: var(--gray-400);
        }

        .testimonial-quote-icon {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            font-size: 2rem;
            color: var(--primary-100);
        }

        /* ========== CTA SECTION ========== */
        .cta-section {
            background: linear-gradient(135deg, #0f766e 0%, #14b8a6 50%, #5eead4 100%);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -30%;
            width: 70%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.08), transparent 70%);
            animation: blob 15s ease-in-out infinite;
        }

        .cta-content {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .cta-content h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--white);
            margin-bottom: 1rem;
        }

        .cta-content p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.85);
            max-width: 550px;
            margin: 0 auto 2rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* ========== FOOTER ========== */
        .footer {
            background: var(--dark);
            color: rgba(255, 255, 255, 0.7);
            padding: 4rem 2rem 2rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--white);
            margin-bottom: 1rem;
        }

        .footer-brand .paw-icon {
            width: 34px;
            height: 34px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-light));
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 0.9rem;
        }

        .footer-desc {
            font-size: 0.9rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            max-width: 320px;
        }

        .footer-social {
            display: flex;
            gap: 0.75rem;
        }

        .footer-social a {
            width: 38px;
            height: 38px;
            border-radius: var(--radius-lg);
            background: rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.6);
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .footer-social a:hover {
            background: var(--primary-600);
            color: var(--white);
            transform: translateY(-2px);
        }

        .footer h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 1.25rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.6rem;
        }

        .footer-links a {
            font-size: 0.88rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .footer-links a:hover {
            color: var(--primary-light);
            transform: translateX(3px);
        }

        .footer-bottom {
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero h1 {
                font-size: 2.75rem;
            }

            .hero-desc {
                margin: 0 auto 2rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-stats {
                justify-content: center;
            }

            .hero-image-wrapper {
                max-width: 450px;
                margin: 0 auto;
            }

            .floating-card-1 {
                right: 0;
            }

            .floating-card-2 {
                left: 0;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .testimonials-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero-container {
                padding: 7rem 1.5rem 3rem;
            }

            .hero-stats {
                gap: 1.5rem;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .services-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 0.75rem;
                text-align: center;
            }

            .floating-card {
                display: none;
            }

            .cta-content h2 {
                font-size: 1.75rem;
            }

            .navbar-links {
                gap: 0.3rem;
            }

            .nav-link {
                padding: 0.4rem 0.9rem;
                font-size: 0.82rem;
            }
        }
    </style>
</head>
<body>
    <!-- ========== NAVBAR ========== -->
    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-brand">
                <span class="paw-icon"><i class="fas fa-paw"></i></span>
                PetCare
            </a>
            @if (Route::has('login'))
                <div class="navbar-links">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link nav-link-primary" id="nav-dashboard-btn">
                            <i class="fas fa-th-large"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link" id="nav-login-btn">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link nav-link-primary" id="nav-register-btn">
                                Daftar Sekarang
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <!-- ========== HERO SECTION ========== -->
    <section class="hero" id="hero-section">
        <!-- Paw decorations -->
        <i class="fas fa-paw paw-decoration paw-1"></i>
        <i class="fas fa-paw paw-decoration paw-2"></i>
        <i class="fas fa-paw paw-decoration paw-3"></i>
        <i class="fas fa-paw paw-decoration paw-4"></i>

        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Klinik Hewan Terpercaya #1
                </div>
                <h1>Sahabat Terbaik untuk <span>Peliharaan</span> Anda</h1>
                <p class="hero-desc">
                    Dari pemeriksaan rutin hingga perawatan khusus, tim dokter hewan profesional kami siap memastikan hewan peliharaan Anda menjalani hidup yang bahagia dan sehat.
                </p>
                <div class="hero-buttons">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-white" id="hero-dashboard-btn">
                            <i class="fas fa-th-large"></i> Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-white" id="hero-login-btn">
                            <i class="fas fa-sign-in-alt"></i> Masuk Sekarang
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-white" id="hero-register-btn">
                            <i class="fas fa-user-plus"></i> Buat Akun
                        </a>
                        @endif
                    @endauth
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="hero-stat-number" id="stat-doctors">10+</div>
                        <div class="hero-stat-label">Dokter Hewan</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-number" id="stat-patients">500+</div>
                        <div class="hero-stat-label">Pasien Ditangani</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-number" id="stat-rating">4.9</div>
                        <div class="hero-stat-label">Rating</div>
                    </div>
                </div>
            </div>

            <div class="hero-image-wrapper">
                <div class="hero-image-blob"></div>
                <div class="hero-image">
                    <img src="{{ asset('img/hero-petcare.png') }}" alt="PetCare - Klinik Hewan Terpercaya" id="hero-main-image">
                </div>

                <!-- Floating Cards -->
                <div class="floating-card floating-card-1">
                    <div class="floating-card-icon" style="background: linear-gradient(135deg, #dcfce7, #bbf7d0); color: #16a34a;">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="floating-card-text">Terpercaya</div>
                    <div class="floating-card-sub">Dokter Bersertifikat</div>
                </div>
                <div class="floating-card floating-card-2">
                    <div class="floating-card-icon" style="background: linear-gradient(135deg, #fef3c7, #fde68a); color: #d97706;">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="floating-card-text">Perawatan 24/7</div>
                    <div class="floating-card-sub">Selalu Siap Melayani</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== SERVICES SECTION ========== -->
    <section class="section" id="services-section">
        <div class="section-container">
            <div class="section-header animate-on-scroll">
                <span class="section-tag">
                    <i class="fas fa-hand-holding-medical"></i> Layanan Kami
                </span>
                <h2 class="section-title">Apa yang Kami Berikan</h2>
                <p class="section-subtitle">Berbagai layanan kesehatan hewan terlengkap dengan standar kualitas tinggi untuk peliharaan kesayangan Anda.</p>
            </div>
            <div class="services-grid">
                <div class="service-card animate-on-scroll" id="service-emergency">
                    <div class="service-icon service-icon-rose">
                        <i class="fas fa-ambulance"></i>
                    </div>
                    <h3>Perawatan Darurat</h3>
                    <p>Layanan gawat darurat 24 jam untuk penanganan cepat dan tepat saat hewan peliharaan Anda membutuhkan pertolongan segera.</p>
                </div>
                <div class="service-card animate-on-scroll" id="service-vaccination">
                    <div class="service-icon service-icon-teal">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <h3>Vaksinasi</h3>
                    <p>Program vaksinasi lengkap untuk melindungi hewan peliharaan Anda dari berbagai penyakit menular yang berbahaya.</p>
                </div>
                <div class="service-card animate-on-scroll" id="service-consultation">
                    <div class="service-icon service-icon-purple">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Konsultasi</h3>
                    <p>Konsultasi mendalam dengan dokter hewan berpengalaman mengenai kesehatan dan perilaku peliharaan Anda.</p>
                </div>
                <div class="service-card animate-on-scroll" id="service-grooming">
                    <div class="service-icon service-icon-amber">
                        <i class="fas fa-cut"></i>
                    </div>
                    <h3>Grooming</h3>
                    <p>Layanan perawatan bulu, kuku, dan kebersihan hewan peliharaan agar selalu tampil bersih dan sehat.</p>
                </div>
                <div class="service-card animate-on-scroll" id="service-nutrition">
                    <div class="service-icon service-icon-green">
                        <i class="fas fa-apple-alt"></i>
                    </div>
                    <h3>Konseling Nutrisi</h3>
                    <p>Panduan nutrisi yang disesuaikan dengan kebutuhan spesifik hewan peliharaan untuk menunjang tumbuh kembang optimal.</p>
                </div>
                <div class="service-card animate-on-scroll" id="service-checkup">
                    <div class="service-icon service-icon-blue">
                        <i class="fas fa-stethoscope"></i>
                    </div>
                    <h3>Pemeriksaan Rutin</h3>
                    <p>Check-up berkala untuk memantau kesehatan hewan peliharaan dan mendeteksi dini masalah kesehatan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== ABOUT SECTION ========== -->
    <section class="section about-section" id="about-section">
        <div class="section-container">
            <div class="about-grid">
                <div class="about-image-wrapper animate-on-scroll">
                    <div class="about-image">
                        <img src="{{ asset('img/gambar-klinik.png') }}" alt="Klinik PetCare" id="about-clinic-image">
                    </div>
                    <div class="about-accent-box">
                        <div class="accent-number">5+</div>
                        <div class="accent-text">Tahun Pengalaman</div>
                    </div>
                </div>
                <div class="about-content animate-on-scroll">
                    <span class="section-tag">
                        <i class="fas fa-info-circle"></i> Tentang Kami
                    </span>
                    <h2>Kenapa Memilih <span style="color: var(--primary-600);">PetCare</span>?</h2>
                    <p>Kami adalah klinik hewan yang berdedikasi untuk memberikan pelayanan kesehatan terbaik bagi hewan peliharaan Anda. Dengan tim dokter berpengalaman dan fasilitas modern, kami siap menjadi partner kesehatan peliharaan Anda.</p>
                    <ul class="about-features">
                        <li>
                            <span class="check-icon"><i class="fas fa-check"></i></span>
                            Dokter hewan bersertifikat & berpengalaman
                        </li>
                        <li>
                            <span class="check-icon"><i class="fas fa-check"></i></span>
                            Peralatan medis modern & steril
                        </li>
                        <li>
                            <span class="check-icon"><i class="fas fa-check"></i></span>
                            Pelayanan ramah & penuh kasih sayang
                        </li>
                        <li>
                            <span class="check-icon"><i class="fas fa-check"></i></span>
                            Sistem appointment online yang mudah
                        </li>
                    </ul>
                    <a href="{{ route('login') }}" class="btn btn-primary" id="about-login-btn">
                        <i class="fas fa-arrow-right"></i> Mulai Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== STATS SECTION ========== -->
    <section class="section stats-section" id="stats-section">
        <div class="section-container">
            <div class="stats-grid">
                <div class="stat-item animate-on-scroll">
                    <div class="stat-icon"><i class="fas fa-user-md"></i></div>
                    <div class="stat-number" data-target="10">0</div>
                    <div class="stat-label">Dokter Spesialis</div>
                </div>
                <div class="stat-item animate-on-scroll">
                    <div class="stat-icon"><i class="fas fa-paw"></i></div>
                    <div class="stat-number" data-target="500">0</div>
                    <div class="stat-label">Hewan Ditangani</div>
                </div>
                <div class="stat-item animate-on-scroll">
                    <div class="stat-icon"><i class="fas fa-smile"></i></div>
                    <div class="stat-number" data-target="350">0</div>
                    <div class="stat-label">Klien Puas</div>
                </div>
                <div class="stat-item animate-on-scroll">
                    <div class="stat-icon"><i class="fas fa-award"></i></div>
                    <div class="stat-number" data-target="5">0</div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== TESTIMONIALS SECTION ========== -->
    <section class="section" id="testimonials-section">
        <div class="section-container">
            <div class="section-header animate-on-scroll">
                <span class="section-tag">
                    <i class="fas fa-quote-left"></i> Testimoni
                </span>
                <h2 class="section-title">Apa Kata Mereka?</h2>
                <p class="section-subtitle">Cerita bahagia dari para pemilik hewan peliharaan yang mempercayakan kami untuk merawat sahabat kecil mereka.</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card animate-on-scroll" id="testimonial-1">
                    <i class="fas fa-quote-right testimonial-quote-icon"></i>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Dokternya sangat ramah dan teliti. Kucing saya yang tadinya lemas sekarang sudah aktif bermain lagi. Terima kasih PetCare!"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">AS</div>
                        <div>
                            <div class="testimonial-name">Andi Saputra</div>
                            <div class="testimonial-pet">Pemilik Kucing Persia</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card animate-on-scroll" id="testimonial-2">
                    <i class="fas fa-quote-right testimonial-quote-icon"></i>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Pelayanan yang sangat profesional! Anjing saya mendapat perawatan terbaik. Sistem booking online-nya juga sangat memudahkan."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">RW</div>
                        <div>
                            <div class="testimonial-name">Rina Wulandari</div>
                            <div class="testimonial-pet">Pemilik Golden Retriever</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card animate-on-scroll" id="testimonial-3">
                    <i class="fas fa-quote-right testimonial-quote-icon"></i>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Sudah 3 tahun jadi pelanggan setia PetCare. Selalu puas dengan layanannya. Hamsterku selalu sehat berkat vaksinasi rutin di sini."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">BH</div>
                        <div>
                            <div class="testimonial-name">Budi Hartono</div>
                            <div class="testimonial-pet">Pemilik Hamster</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CTA SECTION ========== -->
    <section class="section cta-section" id="cta-section">
        <div class="section-container">
            <div class="cta-content animate-on-scroll">
                <h2>Siap Merawat Peliharaan Anda?</h2>
                <p>Bergabunglah dengan ribuan pemilik hewan peliharaan yang mempercayakan kesehatan sahabat kecilnya kepada kami.</p>
                <div class="cta-buttons">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-white" id="cta-dashboard-btn">
                            <i class="fas fa-th-large"></i> Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-white" id="cta-login-btn">
                            <i class="fas fa-sign-in-alt"></i> Masuk Sekarang
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-white" id="cta-register-btn">
                            <i class="fas fa-user-plus"></i> Daftar Gratis
                        </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- ========== FOOTER ========== -->
    <footer class="footer" id="main-footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div>
                    <div class="footer-brand">
                        <span class="paw-icon"><i class="fas fa-paw"></i></span>
                        PetCare
                    </div>
                    <p class="footer-desc">Klinik hewan terpercaya yang berkomitmen memberikan pelayanan kesehatan terbaik untuk hewan peliharaan Anda.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div>
                    <h4>Layanan</h4>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-chevron-right" style="font-size:0.6rem"></i> Perawatan Darurat</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right" style="font-size:0.6rem"></i> Vaksinasi</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right" style="font-size:0.6rem"></i> Konsultasi</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right" style="font-size:0.6rem"></i> Grooming</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Menu</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('login') }}"><i class="fas fa-chevron-right" style="font-size:0.6rem"></i> Login</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}"><i class="fas fa-chevron-right" style="font-size:0.6rem"></i> Daftar</a></li>
                        @endif
                        <li><a href="#services-section"><i class="fas fa-chevron-right" style="font-size:0.6rem"></i> Layanan</a></li>
                        <li><a href="#about-section"><i class="fas fa-chevron-right" style="font-size:0.6rem"></i> Tentang Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Kontak</h4>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-map-marker-alt" style="font-size:0.8rem"></i> Sulawesi Barat, Indonesia</a></li>
                        <li><a href="#"><i class="fas fa-phone" style="font-size:0.8rem"></i> +62 812-3456-7890</a></li>
                        <li><a href="#"><i class="fas fa-envelope" style="font-size:0.8rem"></i> info@petcare.id</a></li>
                        <li><a href="#"><i class="fas fa-clock" style="font-size:0.8rem"></i> 08:00 - 21:00 WITA</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div>&copy; {{ date('Y') }} PetCare. All rights reserved.</div>
                <div>Made with <i class="fas fa-heart" style="color: #e11d48; font-size: 0.8rem;"></i> for your pets</div>
            </div>
        </div>
    </footer>

    <!-- ========== SCRIPTS ========== -->
    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Scroll animations
        const animatedElements = document.querySelectorAll('.animate-on-scroll');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        animatedElements.forEach(el => observer.observe(el));

        // Stats counter animation
        const statNumbers = document.querySelectorAll('.stat-number[data-target]');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.getAttribute('data-target'));
                    let current = 0;
                    const increment = target / 60;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            clearInterval(timer);
                            current = target;
                        }
                        entry.target.textContent = Math.floor(current) + '+';
                    }, 30);
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statNumbers.forEach(el => statsObserver.observe(el));

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>
