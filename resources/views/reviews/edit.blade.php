@extends('layouts.app')

@section('title', 'Modifier votre avis')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier votre avis</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reviews.update', $review) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label">Service évalué</label>
                            <select name="service_type" class="form-select @error('service_type') is-invalid @enderror" required>
                                <option value="">Sélectionnez un service</option>
                                <option value="découpe laser" {{ $review->service_type == 'découpe laser' ? 'selected' : '' }}>
                                    Découpe Laser
                                </option>
                                <option value="enseignes" {{ $review->service_type == 'enseignes' ? 'selected' : '' }}>
                                    Enseignes
                                </option>
                                <option value="design" {{ $review->service_type == 'design' ? 'selected' : '' }}>
                                    Design Graphique
                                </option>
                            </select>
                            @error('service_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Note</label>
                            <div class="rating">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}" 
                                        {{ $review->rating == $i ? 'checked' : '' }} required>
                                    <label for="star{{ $i }}">☆</label>
                                @endfor
                            </div>
                            @error('rating')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="form-label">Votre avis (optionnel)</label>
                            <textarea name="comment" id="comment" rows="4" 
                                class="form-control @error('comment') is-invalid @enderror">{{ $review->comment }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Mettre à jour mon avis
                            </button>
                            <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
}

.rating > input {
    display: none;
}

.rating > label {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
    padding: 0 0.2em;
}

.rating > input:checked ~ label,
.rating > label:hover,
.rating > label:hover ~ label {
    color: #ffc107;
}

.rating > input:checked + label:hover,
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label,
.rating > input:checked ~ label:hover ~ label {
    color: #ffd700;
}
</style>
@endsection
