@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
<div class="container mt-4">
    <!-- Filter Buttons -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-center gap-2 flex-wrap">
                <button class="btn btn-outline-primary filter-btn active" data-type="all">Tous</button>
                @foreach($types as $type)
                    <button class="btn btn-outline-primary filter-btn" data-type="{{ $type }}">{{ $type }}</button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Projects Grid -->
    <div class="row">
        @forelse($projects as $project)
            <div class="col-md-4 mb-4 project-item" data-type="{{ $project->type }}">
                <div class="card h-100" style="cursor: pointer;">
                    @if($project->images->isNotEmpty())
                    <div id="carousel-{{ $project->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($project->images->take(3) as $index => $image)
                                <div class="carousel-item @if($index === 0) active @endif">
                                    <img src="{{ asset('storage/' . $image->path) }}"
                                         class="d-block w-100"
                                         alt="{{ $project->title }}"
                                         onclick="openFullscreen('{{ asset('storage/' . $image->path) }}')"
                                         style="height: 250px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $project->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Précédent</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $project->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Suivant</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-primary">{{ $project->type }}</span>
                    </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Aucun projet n'a été ajouté pour le moment.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- Fullscreen Image Viewer -->
<div id="fullscreen-viewer">
    <button onclick="hideFullscreen()"
            style="position: absolute; top: 20px; right: 20px; background: white; color: black; border: none; border-radius: 50%; width: 40px; height: 40px; font-size: 24px; cursor: pointer;">&times;</button>
    <img id="fullscreen-image" src="" alt="Image en plein écran">
</div>

<style>
.filter-btn {
    padding: 8px 20px;
    border-radius: 20px;
    transition: all 0.3s ease;
    margin: 5px;
}

.filter-btn.active {
    background-color: var(--primary-color);
    color: white;
    border-color: white;
}

.project-item.hidden {
    display: none !important;
}

.card {
    transition: transform 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(40, 167, 69, 0.2);
}

#fullscreen-viewer {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.95);
    z-index: 9999;
    overflow: auto;
    padding: 3rem;
}

#fullscreen-viewer img {
    display: block;
    margin: auto;
    max-width: 100%;
    height: auto;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectItems = document.querySelectorAll('.project-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            const type = button.getAttribute('data-type');

            projectItems.forEach(item => {
                if (type === 'all' || item.dataset.type === type) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
});

function openFullscreen(url) {
    const viewer = document.getElementById('fullscreen-viewer');
    const image = document.getElementById('fullscreen-image');
    image.src = url;
    viewer.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function hideFullscreen() {
    document.getElementById('fullscreen-viewer').style.display = 'none';
    document.body.style.overflow = 'auto';
}

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') hideFullscreen();
});

document.getElementById('fullscreen-viewer').addEventListener('click', function (e) {
    if (e.target === this) hideFullscreen();
});
</script>
@endsection
