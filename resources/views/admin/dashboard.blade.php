@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-primary mb-2">UTILISATEURS</h6>
                            <h2 class="display-5 mb-0">{{ $stats['counts']['users'] }}</h2>
                        </div>
                        <div class="text-primary">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-success mb-2">MESSAGES</h6>
                            <h2 class="display-5 mb-0">{{ $stats['counts']['messages'] }}</h2>
                        </div>
                        <div class="text-success">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-info mb-2">PROJETS</h6>
                            <h2 class="display-5 mb-0">{{ $stats['counts']['projects'] }}</h2>
                        </div>
                        <div class="text-info">
                            <i class="fas fa-project-diagram fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Users Table -->
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Utilisateurs Récents</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Entreprise</th>
                            <th>Date d'inscription</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->company ?? '-' }}</td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.satisfaction-section {
    background: white;
    border-radius: 8px;
    padding: 2rem;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    border-left: 4px solid #ffc107;
}

.percentage {
    font-size: 3rem;
    font-weight: 300;
    color: #333;
    margin-bottom: 0.5rem;
}

.label {
    color: #6c757d;
    font-size: 1rem;
}

.card {
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    border: none;
    border-radius: 8px;
}

.stats-card {
    background: #fff;
    transition: transform 0.2s;
}

.stats-card:hover {
    transform: translateY(-5px);
}

.table th {
    background-color: #f8f9fa;
    font-weight: 600;
    border-bottom: 2px solid #dee2e6;
}

.display-5 {
    font-size: 2.5rem;
    font-weight: 600;
    line-height: 1.2;
}

h5 {
    font-weight: 600;
    color: #333;
    font-size: 1.25rem;
}

h6 {
    font-weight: 600;
    letter-spacing: 0.5px;
}

.card-body {
    padding: 1.5rem;
}

.text-primary {
    color: #0d6efd !important;
}

.text-success {
    color: #198754 !important;
}

.text-info {
    color: #0dcaf0 !important;
}

.table td {
    vertical-align: middle;
    padding: 1rem;
}
</style>
@endpush
@endsection
