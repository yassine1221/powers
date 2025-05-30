@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Ajouter une page</h1>
        <a href="{{ route('admin.page-settings.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Retour
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.page-settings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="page_name" class="form-label">Page *</label>
                    <select class="form-select @error('page_name') is-invalid @enderror" id="page_name" name="page_name" required>
                        <option value="">Sélectionnez une page...</option>
                        @foreach($availablePages as $value => $label)
                            <option value="{{ $value }}" {{ old('page_name') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('page_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hero_title" class="form-label">Titre *</label>
                    <input type="text" class="form-control @error('hero_title') is-invalid @enderror" 
                           id="hero_title" name="hero_title" value="{{ old('hero_title') }}" required>
                    @error('hero_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hero_description" class="form-label">Description *</label>
                    <textarea class="form-control @error('hero_description') is-invalid @enderror" 
                              id="hero_description" name="hero_description" rows="3" required>{{ old('hero_description') }}</textarea>
                    @error('hero_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hero_background" class="form-label">Image d'arrière-plan</label>
                    <input type="file" class="form-control @error('hero_background') is-invalid @enderror" 
                           id="hero_background" name="hero_background" accept="image/*">
                    <small class="form-text text-muted">Format recommandé : 1920x1080px, max 2MB</small>
                    @error('hero_background')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
.form-control:focus, .form-select:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
}
</style>
@endpush
@endsection
