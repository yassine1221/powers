@extends('layouts.app')

@section('title', 'Nos Services')

@push('styles')
<link href="{{ asset('css/services.css') }}" rel="stylesheet">
<style>
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
.section {
    padding: 4rem 0;
}
.section h2 {
    font-weight: 600;
    margin-bottom: 1rem;
    color: #198754;
}

.section ul li {
    font-size: 1.1rem;
}
.carousel-inner img {
    max-width: 100%;
    border-radius: 1rem;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
.section .btn {
    margin-top: 1rem;
}
.bg-light {
    background-color: #f8f9fa !important;
}
.icon-title {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.icon-title i {
    color:rgb(32, 25, 135);
}
</style>
@endpush

@section('content')

{{-- INDUSTRIE PUBLICITAIRE --}}
<section id="industrie" class="section bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="icon-title mb-3">
                    <i class="fas fa-bullhorn fa-2x"></i>
                    <h2>Industrie Publicitaire</h2>
                </div>
                <ul class="list-unstyled">
                    <li>✓ Création de supports publicitaires</li>
                    <li>✓ Habillage de vitrines et véhicules</li>
                    <li>✓ Impression grand format</li>
                    <li>✓ Enseignes lumineuses et classiques</li>
                    <li>✓ Installation de panneaux</li>
                </ul>
                <a href="/contact" class="btn btn-custom-blue ">Demander un devis</a>
            </div>
            <div class="col-md-4">
                <div id="carouselIndustrie" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach([
                            'instagram perfect signs-25.jpg',
                            'instagram perfect signs-6.jpg',
                            'instagram perfect signs-15.jpg',
                            'instagram perfect signs-26.jpg'
                        ] as $i => $img)
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                            <img src="{{ asset("storage/powerssingns/$img") }}" alt="Industrie Publicitaire {{ $i+1 }}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DECOUPE CNC ET LASER --}}
<section id="decoupe" class="section bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 ">
                <div class="icon-title mb-3">
                    <i class="fas fa-cut fa-2x"></i>
                    <h2>Découpe CNC & LASER</h2>
                </div>
                <ul class="list-unstyled">
                    <li>✓ Découpe et gravure sur bois, métal, plexi...</li>
                    <li>✓ Réalisation sur mesure</li>
                    <li>✓ Finitions professionnelles</li>
                    <li>✓ Haute précision</li>
                </ul>
                <a href="/contact" class="btn btn-custom-blue ">Demander un devis</a>
            </div>
            <div class="col-md-4 order-md-1">
                <div id="carouselDecoupe" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach([
                            'instagram perfect signs-7.jpg',
                            'instagram perfect signs-13.jpg',
                            'instagram perfect signs-22.jpg',
                            'instagram perfect signs-23.jpg'
                        ] as $i => $img)
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                            <img src="{{ asset("storage/powerssingns/$img") }}" alt="Découpe CNC {{ $i+1 }}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VENTE DE MATERIEL --}}
<section id="vente" class="section bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="icon-title mb-3">
                    <i class="fas fa-store fa-2x"></i>
                    <h2>Impression numérique & UV</h2>
                </div>
                <ul class="list-unstyled">
                    <li>✓ Impression haute résolution sur tous types de supports</li>
                    <li>✓ Résistance aux UV et intempéries</li>
                    <li>✓ Qualité professionnelle pour une durabilité maximale</li>
                    <li>✓ Supports rigides (PVC, Dibond, Plexi...) et souples (bâche, vinyle, textile...)</li>
                </ul>
                <a href="/contact" class="btn btn-custom-blue ">Demander un devis</a>
            </div>
            <div class="col-md-4">
                <div id="carouselVente" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach(['instagram perfect signs-4.jpg', 'instagram perfect signs-14.jpg', 'instagram perfect signs-17.jpg', 'instagram perfect signs-28.jpg'] as $i => $img)
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                           <img src="{{ asset("storage/powerssingns/$img") }}" alt="Découpe CNC {{ $i+1 }}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
