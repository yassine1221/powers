@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Modifier les paramètres de la page</h1>
        <a href="{{ route('admin.page-settings.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Retour
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.page-settings.update', $pageSetting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="hero_title" class="form-label">Titre</label>
                    <input type="text" class="form-control @error('hero_title') is-invalid @enderror" 
                           id="hero_title" name="hero_title" value="{{ old('hero_title', $pageSetting->hero_title) }}" required>
                    @error('hero_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hero_description" class="form-label">Description</label>
                    <textarea class="form-control @error('hero_description') is-invalid @enderror" 
                              id="hero_description" name="hero_description" rows="3" required>{{ old('hero_description', $pageSetting->hero_description) }}</textarea>
                    @error('hero_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hero_background" class="form-label">Image d'arrière-plan</label>
                    @if($pageSetting->hero_background)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $pageSetting->hero_background) }}" 
                                 alt="Current background" 
                                 class="img-thumbnail"
                                 style="max-height: 200px;">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('hero_background') is-invalid @enderror" 
                           id="hero_background" name="hero_background" accept="image/*">
                    <small class="form-text text-muted">Laissez vide pour conserver l'image actuelle</small>
                    @error('hero_background')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
.img-thumbnail {
    border: 2px solid #28a745;
}
</style>
@endpush
@endsection
