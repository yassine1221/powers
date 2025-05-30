<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Power Signs - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @stack('styles')
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white" style="width: 250px; min-height: 100vh;">
            <div class="d-flex flex-column h-100">
                <div class="p-3">
                    <h5>Powersings</h5>
                    <h5>Espase de controle</h5>
                </div>
                <div class="nav flex-column">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.users') }}" class="nav-link text-white {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <i class="fas fa-users me-2"></i> Utilisateurs
                    </a>
                    <a href="{{ route('admin.messages') }}" class="nav-link text-white {{ request()->routeIs('admin.messages') ? 'active' : '' }}">
                        <i class="fas fa-envelope me-2"></i> Messages
                    </a>
                    <a href="{{ route('admin.projects') }}" class="nav-link text-white {{ request()->routeIs('admin.projects') ? 'active' : '' }}">
                        <i class="fas fa-project-diagram me-2"></i> Projets
                    </a>
                    <a href="{{ route('admin.reviews.index') }}" class="nav-link text-white {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                        <i class="fas fa-star me-2"></i> Avis
                    </a>
                    <a href="{{ route('admin.page-settings.index') }}" class="nav-link text-white {{ request()->routeIs('admin.page-settings.*') ? 'active' : '' }}">
                        <i class="fas fa-cog me-2"></i> Paramètres des Pages
                    </a>
                </div>
                <!-- Déconnexion button at the bottom -->
                <div class="mt-auto p-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100">
                            <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1">
            @if(isset($pageSetting))
                <div class="hero-section position-relative text-white py-5" 
                     style="background: @if($pageSetting->hero_background) 
                                linear-gradient(rgba(40, 167, 69, 0.8), rgba(40, 167, 69, 0.9)), 
                                url('{{ asset('storage/' . $pageSetting->hero_background) }}')
                            @else
                                linear-gradient(45deg, #28a745, #34d058)
                            @endif 
                            no-repeat center center; background-size: cover;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 text-center">
                                <h1 class="display-4 fw-bold mb-4">{{ $pageSetting->hero_title }}</h1>
                                <p class="lead mb-4" style="font-size: 1.25rem;">{{ $pageSetting->hero_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    <style>
        .nav-link {
            padding: 0.8rem 1rem;
            transition: all 0.3s;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .nav-link.active {
            background-color: #28a745;
        }
        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: #fff;
            color: #fff;
        }
        .hero-section {
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(40, 167, 69, 0.1);
        }
        .hero-section h1 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .hero-section p {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
    </style>
</body>
</html>
