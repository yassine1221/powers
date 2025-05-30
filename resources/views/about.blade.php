@extends('layouts.app')

@section('title', 'À propos')

@section('content')


<section class="section">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 20px;">
            <div class="col-md-4 ; align-items: center;">
            <img src="{{ asset('storage/powerssingns/instagram perfect signs-2.jpg') }}" style="width: 300px; height: auto; border-radius: 8px;" alt="1">
            </div>
            <div class="col-md-4">
                <div class="bg-light p-4 rounded">
                    <h4>Nos Valeurs</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <h5>🎯 Précision</h5>
                            <p>Chaque détail compte dans la réalisation de vos projets</p>
                        </li>
                        <li class="mb-3">
                            <h5>💡 Innovation</h5>
                            <p>Nous utilisons les dernières technologies pour des résultats optimaux</p>
                        </li>
                        <li class="mb-3">
                            <h5>🤝 Service Client</h5>
                            <p>Votre satisfaction est notre priorité</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 ; align-items: center;">
            <img src="{{ asset('storage/powerssingns/instagram perfect signs-27.jpg') }}" style="width: 300px; height: auto; border-radius: 8px;" alt="1">
            </div>
        </div>


        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="mb-4">Notre Expertise</h2>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Technologie de pointe</h4>
                            <div class="col-md-6 ; align-items center;">
                                <img src="{{ asset('storage/powerssingns/instagram perfect signs-5.jpg') }}" style="width: 300px; height: auto; border-radius: 8px;" alt="1">
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Savoir-faire artisanal</h4>
                        <div class="card-body">
                            <div class="col-md-6 ; align-items: center;">
                                <img src="{{ asset('storage/powerssingns/instagram perfect signs-3.jpg') }}" style="width: 300px; height: auto; border-radius: 8px;" alt="1">
                            </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Design créatif</h4>
                        <div class="card-body">
                            <div class="col-md-6 ; align-items: center;">
                                <img src="{{ asset('storage/powerssingns/instagram perfect signs-6.jpg') }}" style="width: 300px; height: auto; border-radius: 8px;" alt="1">
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- SECTION: Notre Atelier -->
<section class="py-5 bg-light" id="atelier">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Notre Atelier</h2>
            <p class="text-muted lead">Un espace moderne équipé pour répondre à tous vos besoins</p>
        </div>

        <div class="row g-4">
            <!-- Équipements -->
            <div class="col-md-4">
                <div class="card h-100">
                <img src="{{ asset('storage/powerssingns/instagram perfect signs-7.jpg') }}" style="width: 300; height: auto; border-radius: 8px;" alt="1">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Équipements</h5>
                        <p class="card-text">Nos machines modernes assurent une précision maximale dans chaque projet.</p>
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#equipementsModal">
                            Savoir plus
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-90">
                <img src="{{ asset('storage/powerssingns/instagram perfect signs-1.jpg') }}" style="width: 300; height: auto; border-radius: 8px;" alt="1">
                </div>
            </div>

            <!-- Capacités -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/powerssingns/instagram perfect signs-11.jpg') }}" style="width: 300; height: auto; border-radius: 8px;" alt="1">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Capacités</h5>
                        <p class="card-text">De la petite série au projet sur mesure, notre atelier s’adapte à vos besoins.</p>
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#capacitesModal">
                            Savoir plus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODALE: Équipements -->
<div class="modal fade" id="equipementsModal" tabindex="-1" aria-labelledby="equipementsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="equipementsModalLabel">Nos Équipements</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <ul>
                <li>✓ Cisailles pour découpe précise de métaux</li>
                <li>✓ Presses plieuses pour pliages industriels complexes</li>
                <li>✓ Laser Plexi pour coupes nettes sur acrylique et plastiques</li>
                <li>✓ Laser Métal pour découpe de métaux robustes</li>
                <li>✓ CNC Router pour gravure et découpe multi-matériaux</li>
                <li>✓ Machines Plotter pour découpe et impression graphique</li>
                <li>✓ Cintreuses pour courbures précises de métaux et plastiques</li>
                <li>✓ IMM Machine Relief pour moulage en relief sur plastiques</li>
                <li>✓ UV Relief pour motifs en relief sur papiers, bois et verre</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- MODALE: Capacités -->
<div class="modal fade" id="capacitesModal" tabindex="-1" aria-labelledby="capacitesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="capacitesModalLabel">Nos Capacités</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Découpe de divers matériaux (plexiglas, bois, métal, PVC...)</li>
                    <li>Production en petite et moyenne série</li>
                    <li>Création de prototypes personnalisés</li>
                    <li>Design et impression sur mesure</li>
                    <li>Installation sur site par notre équipe</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2>Prêt à démarrer votre projet ?</h2>
                <p class="lead mb-4">Contactez-nous pour discuter de vos besoins</p>
                <a href="/contact" class="btn btn-primary btn-lg">Nous contacter</a>
            </div>
        </div>
    </div>
</section>
@endsection
