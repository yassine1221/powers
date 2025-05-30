<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PowersSigns</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @yield('styles')
    @stack('styles')
    <style>
        :root {
             --primary-color: #003366;        /* الأزرق الغامق (PS من الشعار) */
             --secondary-color: #8dc63f;      /* الأخضر الفاتح (Powers من الشعار) */
             --accent-color: #66cc66;         /* أزرق متوسط للتوازن */
             --text-color: #003366;
             --light-bg: #f5f9f6;             /* خلفية بيضاء مائلة للخضر */
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: var(--light-bg);
            margin: 0;
            padding: 0;
        }
        /* Inputs */
        .form-control:focus, .form-select:focus {
             border-color: var(--primary-color);
             box-shadow: 0 0 0 0.25rem rgba(0, 51, 102, 0.25);
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Modern Navbar Styles */
        .navbar {
            background-color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(40, 167, 69, 0.1);
            width: 100%;
        }

        .navbar-brand {
            color: var(--primary-color) !important;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--secondary-color) !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 2px 15px rgba(40, 167, 69, 0.1);
        }

        .dropdown-item {
            color: var(--text-color) !important;
            padding: 0.75rem 1.5rem;
        }

        .dropdown-item:hover {
            background-color: var(--light-bg);
            color: var(--secondary-color) !important;
        }

        /* Button Styles */
        .btn {
            border-radius: 5px;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: all 0.3s ease;
        } 

        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 51, 102, 0.3);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        /* Card Styles */
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0, 51, 102, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background-color: #fff;
            border-bottom: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        /* Section Styles */
        .section {
            padding: 5rem 0;
            background-color: var(--light-bg);
            width: 100%;
            will-change: opacity, transform;
        }

        .bg-light {
            background-color: var(--light-bg) !important;
        }

        /* Footer Styles */
        .footer {
            background: linear-gradient(to right, rgb(9, 90, 52), rgb(20, 31, 92));
            color: whitesmoke;
            padding: 2rem 0 2rem;
            margin-top: auto;
            width: 100%;
        }

        .footer h5 {
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .footer a {
            color: whitesmoke; 
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer a:hover {
            color:  var(--accent-color)!important;
            transform: translateY(-2px);
        }

        .social-links a {
            display: inline-block;
            margin-right: 1rem;
            font-size: 1.5rem;
            opacity: 0.8;
        }

        .social-links a:hover {
            opacity: 1;
            transform: translateY(-3px);
        }
        .social-link {
        color: var(--primary-color) !important;
        transition: all 0.3s ease;
        text-decoration: none;
    }
.social-link:hover {
    color: var(--accent-color) !important;
    transform: translateY(-3px);
    }

        /* Hero Section */
        .hero-section {
            position: relative;
            background-size: cover;
            background-position: center;
            padding: 6rem 0;
            width: 100%;
            margin: 0;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(0, 51, 102, 0.85), rgba(141, 198, 63, 0.9));
            z-index: 1;
        }

        .hero-section > * {
            position: relative;
            z-index: 2;
        }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
            line-height: 1.3;
            margin: 0;
        }

        .display-4 {
            font-weight: 700;
        }

        .lead {
            font-weight: 400;
            line-height: 1.6;
        }

        .text-primary {
            color: var(--primary-color) !important;
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Reset some default styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        /* Alert */
        .alert-success {
           background-color: rgba(0, 51, 102, 0.05);
           border-color: var(--primary-color);
           color: var(--primary-color);
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('storage/img/Design sans titre (2).png') }}" alt="Logo" style="height: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home me-1"></i>Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('services') }}"><i class="fas fa-cogs me-1"></i>Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('portfolio') }}"><i class="fas fa-images me-1"></i>Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}"><i class="fas fa-info-circle me-1"></i>À propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('reviews.index') }}"><i class="fas fa-star me-1"></i>Avis Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}"><i class="fas fa-envelope me-1"></i>Contact</a></li>
                </ul>

                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i>Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus me-1"></i>Inscription</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if(Auth::user()->isAdmin())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard Admin
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                                        <i class="fas fa-user me-2"></i>Mon Profil
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    @if(isset($pageSetting))
        <div class="hero-section text-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1 class="display-4 fw-bold mb-4">{{ $pageSetting->hero_title }}</h1>
                        <p class="lead mb-4" style="font-size: 1.25rem;">{{ $pageSetting->hero_description }}</p>
                    </div>
                </div>
            </div>
            @if($pageSetting->hero_background)
                <style>
                    .hero-section {
                        background-image: url('{{ asset('storage/' . $pageSetting->hero_background) }}');
                    }
                </style>
            @endif
        </div>
    @endif

    <!-- CONTENU PRINCIPAL -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer style="background: linear-gradient(to right, rgb(9, 90, 52), rgb(20, 31, 92)); color: white; font-size: 14px; padding: 30px 0;">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <div class="col-md-4 mb-4 mb-md-0">
                    <img src="{{ asset('storage/img/logo bl.png') }}" alt="Logo" style="height: 70px;">
                    <div class="mt-3">
                        <p>© 2025 <span style="color: #6ccf00;">Developed by PowersSigns</span></p>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h6 class="fw-bold"><i class="fas fa-address-card me-2"></i>Contact</h6>
                    <p class="mb-2"><i class="fas fa-envelope me-2"></i>contact@perfectsigns.com</p>
                    <p class="mb-0"><i class="fas fa-phone me-2"></i>+212 6 23 45 67 89</p>
                </div>
                <div class="col-md-4">
                    <div class="mb-0 text-md-end text-center">
                        <a href="https://wa.me/33123456789" target="_blank" title="WhatsApp" style="color: #6ccf00; margin-right: 30px;"><i class="fab fa-whatsapp fa-lg"></i></a>
                        <a href="https://www.tiktok.com/@perfectsigns" target="_blank" title="TikTok" style="color: #6ccf00; margin-right: 30px;"><i class="fab fa-tiktok fa-lg"></i></a>
                        <a href="https://www.instagram.com/perfectsigns" target="_blank" title="Instagram" style="color: #6ccf00; margin-right: 30px;"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
