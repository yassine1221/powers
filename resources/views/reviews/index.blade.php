@extends('layouts.app')

@section('title', 'Avis Clients')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Overall Rating Summary -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <h1 class="display-4 mb-0">{{ number_format($averageRating ?? 0, 1) }}</h1>
                            <div class="h3 text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= round($averageRating ?? 0))
                                        <span>★</span>
                                    @else
                                        <span>☆</span>
                                    @endif
                                @endfor
                            </div>
                            <p class="text-muted">{{ $totalReviews }} avis</p>
                        </div>
                        <div class="col-md-8">
                            @foreach(array_reverse($ratingStats) as $rating => $count)
                                <div class="row align-items-center mb-2">
                                    <div class="col-2">{{ $rating }} ★</div>
                                    <div class="col">
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" 
                                                role="progressbar" 
                                                style="width: {{ $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0 }}%"
                                                aria-valuenow="{{ $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0 }}"
                                                aria-valuemin="0" 
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">{{ $count }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews List -->
            @forelse($reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h5 class="card-title mb-0">{{ $review->user->name }}</h5>
                                <small class="text-muted">{{ $review->created_at->format('d/m/Y') }}</small>
                            </div>
                            <div class="text-warning h5 mb-0">{{ $review->stars }}</div>
                        </div>
                        
                        <div class="mb-2">
                            <span class="badge bg-primary">{{ $review->service_type }}</span>
                            @if($review->verified_purchase)
                                <span class="badge bg-success">Achat vérifié</span>
                            @endif
                        </div>

                        <p class="card-text">{{ $review->comment }}</p>

                       
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <h3>Aucun avis pour le moment</h3>
                    <p class="text-muted">Soyez le premier à partager votre expérience !</p>
                </div>
            @endforelse

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $reviews->links() }}
            </div>

            @auth
                <div class="text-center mt-4">
                    <a href="{{ route('reviews.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Ajouter un avis
                    </a>
                </div>
            @else
                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                        Connectez-vous pour laisser un avis
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.progress {
    height: 20px;
}
.progress-bar {
    transition: width 0.6s ease;
}
</style>
@endsection
