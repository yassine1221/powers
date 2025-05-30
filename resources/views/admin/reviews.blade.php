@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestion des Avis</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Service</th>
                            <th>Note</th>
                            <th>Commentaire</th>
                            <th>Achat Vérifié</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reviews as $review)
                        <tr>
                            <td>{{ $review->user->name ?? 'Anonyme' }}</td>
                            <td>{{ ucfirst($review->service_type) }}</td>
                            <td>
                                <span class="text-warning">{{ $review->rating_stars }}</span>
                                <small class="text-muted">({{ $review->rating }}/5)</small>
                            </td>
                            <td>{{ Str::limit($review->comment, 50) }}</td>
                            <td>
                                @if($review->verified_purchase)
                                    <span class="badge bg-success">Vérifié</span>
                                @else
                                    <span class="badge bg-secondary">Non vérifié</span>
                                @endif
                            </td>
                            <td>{{ $review->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucun avis trouvé </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-2">
                {{ $reviews->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .table td {
        vertical-align: middle;
    }
    .btn-group {
        gap: 0.25rem;
    }
</style>
@endsection
