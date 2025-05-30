@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" 
                         alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">{{ $user->name }}</h5>
                    <p class="text-muted mb-1">{{ $user->company ?? 'Particulier' }}</p>
                    <div class="d-flex justify-content-center mb-2">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Modifier le profil</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nom complet</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Entreprise</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->company ?? '-' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Téléphone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->phone ?? '-' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Newsletter</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                @if($user->newsletter)
                                    <span class="badge bg-success">Inscrit</span>
                                @else
                                    <span class="badge bg-secondary">Non inscrit</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Activité récente</h5>
                    <p class="text-muted">Historique de vos dernières interactions :</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="fas fa-user-edit"></i> Dernière modification du profil : 
                            {{ $user->updated_at->format('d/m/Y H:i') }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-calendar-alt"></i> Membre depuis : 
                            {{ $user->created_at->format('d/m/Y') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
