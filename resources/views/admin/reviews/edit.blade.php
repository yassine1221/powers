@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Modifier l'avis</h4>
                    <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="service_type" class="form-label">Type de Service</label>
                            <select class="form-select @error('service_type') is-invalid @enderror" 
                                    id="service_type" 
                                    name="service_type" 
                                    required>
                                @foreach(App\Models\Review::getServiceTypes() as $value => $label)
                                    <option value="{{ $value }}" {{ old('service_type', $review->service_type) == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Note</label>
                            <div class="rating-input">
                                @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" 
                                           id="star{{ $i }}" 
                                           name="rating" 
                                           value="{{ $i }}" 
                                           {{ old('rating', $review->rating) == $i ? 'checked' : '' }}
                                           required>
                                    <label for="star{{ $i }}" title="{{ $i }} étoiles">★</label>
                                @endfor
                            </div>
                            @error('rating')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="comment" class="form-label">Commentaire</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" 
                                    id="comment" 
                                    name="comment" 
                                    rows="4" 
                                    required>{{ old('comment', $review->comment) }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" 
                                       class="form-check-input @error('verified_purchase') is-invalid @enderror" 
                                       id="verified_purchase" 
                                       name="verified_purchase" 
                                       value="1"
                                       {{ old('verified_purchase', $review->verified_purchase) ? 'checked' : '' }}>
                                <label class="form-check-label" for="verified_purchase">
                                    Achat Vérifié
                                </label>
                                @error('verified_purchase')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.rating-input {
    display: inline-flex;
    flex-direction: row-reverse;
    gap: 0.25rem;
}

.rating-input input {
    display: none;
}

.rating-input label {
    cursor: pointer;
    font-size: 2rem;
    color: #ddd;
    transition: color 0.2s;
}

.rating-input label:hover,
.rating-input label:hover ~ label,
.rating-input input:checked ~ label {
    color: #ffd700;
}

.rating-input label:hover,
.rating-input label:hover ~ label {
    color: #ffed4a;
}
</style>
@endsection
