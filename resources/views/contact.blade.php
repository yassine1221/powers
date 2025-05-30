@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<div class="container py-5" style="margin-top: -2rem;">
    <div class="row">
        <!-- Contact Form -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Formulaire de Contact</h2>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom complet *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="request_type" class="form-label">Type de demande *</label>
                            <select class="form-select @error('request_type') is-invalid @enderror" id="request_type" name="request_type" required>
                                <option value="">Choisissez...</option>
                                <option value="Demande d'information">Demande d'information</option>
                                <option value="Devis">Devis</option>
                                <option value="Réclamation">Réclamation</option>
                                <option value="Autre">Autre</option>
                            </select>
                            @error('request_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">J'accepte que mes données soient utilisées pour traiter ma demande</label>
                            @error('terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @if ( Route::has('login'))
                        @auth
                        <button type="submit" class="btn btn-primary">Envoyer le message</button>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">
                        Connectez-vous pour contactez-nous</a>
                        @endauth
                        @endif

                        
                    </form>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="mb-0">Nos Coordonnées</h3>
                </div>
                <div class="card-body">
                    <p><i class="fas fa-map-marker-alt me-2"></i> <strong>Adresse:</strong><br>
                    123 Rue du Commerce<br>
                    75001 Paris, France</p>

                    <p><i class="fas fa-phone me-2"></i> <strong>Téléphone:</strong><br>
                    +33 1 23 45 67 89</p>

                    <p><i class="fas fa-envelope me-2"></i> <strong>Email:</strong><br>
                    contact@perfectsigns.com</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="mb-0">Horaires d'ouverture</h3>
                </div>
                <div class="card-body">
                    <p><strong>Lundi - Vendredi:</strong> 9h00 - 18h00</p>
                    <p><strong>Samedi:</strong> Sur rendez-vous</p>
                    <p><strong>Dimanche:</strong> Fermé</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Suivez-nous</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <a href="#" class="social-link fs-4"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-link fs-4"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link fs-4"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link fs-4"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
.card {
    border: none;
    box-shadow: 0 0 15px rgba(40, 167, 69, 0.1);
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.card-header {
    background-color: #fff;
    border-bottom: 2px solid #28a745;
    color: #28a745;
}

.btn-primary {
    background-color: #28a745;
    border-color: #28a745;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #34d058;
    border-color: #34d058;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
}

.form-control:focus, .form-select:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
}

.social-link {
    color: #28a745 !important;
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-link:hover {
    color: #34d058 !important;
    transform: translateY(-3px);
}

.alert-success {
    background-color: rgba(40, 167, 69, 0.1);
    border-color: #28a745;
    color: #28a745;
}

.form-check-input:checked {
    background-color: #28a745;
    border-color: #28a745;
}
</style>
@endpush
@endsection
