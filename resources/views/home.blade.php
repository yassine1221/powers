@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

{{-- HERO SECTION --}}
<section class="hero-section d-flex align-items-center text-white text-center" style="background-image: url('/storage/img/H1-Decoupe-Laser-Technologie-de-l_Avenir.jpg');">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Bienvenue chez POWERS SIGNS</h1>
        <p class="lead mb-4">Expert en découpe CNC & Laser, signalétique et solutions publicitaires sur mesure</p>
        <a href="#services" class="btn btn-custom-blue">Découvrir nos services</a>
    </div>
</section>

{{-- SERVICES --}}
<section id="services" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Nos Services</h2>
        <div class="row g-4">

            <!-- Service -->
            @php
            $services = [
                ['icon' => 'bullhorn', 'title' => 'Industrie Publicitaire', 'desc' => 'Création d’enseignes, impression, habillage de vitrines & véhicules.', 'link' => '/services#industrie'],
                ['icon' => 'cut', 'title' => 'Découpe CNC & LASER', 'desc' => 'Gravure et découpe sur bois, métal, plexi, etc.', 'link' => '/services#decoupe'],
                ['icon' => 'store', 'title' => 'Impression numérique & UV', 'desc' => 'Découpe CNC & LASER Gravure et découpe sur bois, métal, plexi, etc.', 'link' => '/services#vente'],
            ];
            @endphp

            @foreach($services as $service)
            <div class="col-md-4">
                <div class="card glass-card h-100 text-center p-4">
                    <i class="fas fa-{{ $service['icon'] }} fa-3x text-success mb-3"></i>
                    <h4 class="fw-semibold">{{ $service['title'] }}</h4>
                    <p>{{ $service['desc'] }}</p>
                    <a href="{{ $service['link'] }}" class="btn btn-outline-primary">Voir plus</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- WHY US --}}
<section class="why-us-section py-5 text-white">
    <div class="container">
        <h2 class="text-center h1 mb-5 fw-bold">Pourquoi nous choisir ?</h2>
        <div class="row g-4 text-center">

            @php
            $features = [
                ['icon' => 'star', 'title' => 'Expertise', 'text' => 'Savoir-faire artisanal + technologie avancée.'],
                ['icon' => 'tools', 'title' => 'Sur Mesure', 'text' => 'Solutions adaptées à vos projets.'],
                ['icon' => 'clock', 'title' => 'Rapidité', 'text' => 'Livraison rapide et ponctuelle.'],
                ['icon' => 'check-circle', 'title' => 'Qualité', 'text' => 'Résultats professionnels assurés.'],
            ];
            @endphp

            @foreach($features as $feature)
            <div class="col-md-6 col-lg-3">
                <div class="feature-card p-4">
                    <i class="fas fa-{{ $feature['icon'] }} fa-2x mb-3 text-success"></i>
                    <h5>{{ $feature['title'] }}</h5>
                    <p>{{ $feature['text'] }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
}

/* HERO */
.hero-section {
    height: 100vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    padding: 0 2rem;
    background-blend-mode: overlay;
    background-color: rgba(0, 0, 0, 0.5);
}

/* SERVICES + WHY US */
.glass-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 1rem;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}
.glass-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
}
.feature-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(6px);
    border-radius: 1rem;
    transition: transform 0.3s ease;
    color: white;
    border: 1px solid rgba(255,255,255,0.2);
}
.feature-card:hover {
    transform: translateY(-5px);
}

/* WHY US BACKGROUND */
.why-us-section {
    background-image: linear-gradient(to right,rgb(9, 90, 52),rgb(20, 31, 92));
}
.btn-custom-blue {
    background-color: white; /* Bleu */
    color:  rgb(0, 74, 152);
    border: 2px solid rgb(0, 74, 152);
    transition: all 0.3s ease;
}

.btn-custom-blue:hover {
    background-color:  rgb(0, 74, 152);
    color:white;
    border-color: rgb(0, 74, 152);
}

</style>
@endpush

@endsection
