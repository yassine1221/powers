@extends('layouts.app')

@section('title', 'Laisser un avis')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laisser un avis</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reviews.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">Service évalué</label>
                            <select name="service_type" class="form-select @error('service_type') is-invalid @enderror" required>
                                <option value="">Sélectionnez un service</option>
                                <option value="Industrie Publicitaire" {{ old('service_type') == 'Industrie Publicitaire' ? 'selected' : '' }}>
                                Industrie Publicitaire
                                </option>
                                <option value="Découpe CNC & LASER" {{ old('service_type') == 'Découpe CNC & LASER' ? 'selected' : '' }}>
                                Découpe CNC & LASER
                                </option>
                                <option value="Impression numérique & UV" {{ old('service_type') == 'Impression numérique & UV' ? 'selected' : '' }}>
                                Impression numérique & UV
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
                                        {{ old('rating') == $i ? 'checked' : '' }} required>
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
                                class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Publier mon avis
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
