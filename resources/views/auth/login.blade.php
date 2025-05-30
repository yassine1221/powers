@extends('layouts.app')

@section('title', 'Connexion')

@section('content')



<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Connexion</h2>
                        <form method="POST" action="{{ route('login') }}" class="mb-4">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                    id="email" name="email" placeholder="Adresse email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                    id="password" placeholder="Password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Se souvenir de moi</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">Se connecter</button>
                        </form>
                        <div class="mb-3 text-end">
                            <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                        </div>

                        <div class="text-center">
                            <p>Vous n'avez pas de compte ?</p>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">
                                Créer un compte
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title h5">Avantages de votre espace client</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">✓ Suivi de vos commandes en temps réel</li>
                            <li class="mb-2">✓ Historique de vos projets</li>
                            <li class="mb-2">✓ Devis personnalisés</li>
                            <li>✓ Communication facilitée avec notre équipe</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.section {
    padding: 4rem 4rem;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
}

.card {
    border: none;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.card-title {
    color: var(--primary-color);
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    padding: 0.75rem 1.5rem;
}

.btn-primary:hover {
    background-color: darken(var(--primary-color), 10%);
    border-color: darken(var(--primary-color), 10%);
}

.btn-outline-primary {
    color: var(--primary-color);
    border-color: var(--primary-color);
}

.btn-outline-primary:hover {
    background-color: var(--primary-color);
    color: white;
}
</style>
@endsection
