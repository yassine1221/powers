@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Paramètres des Pages</h1>
        <a href="{{ route('admin.page-settings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Ajouter une page
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Page</th>
                            <th>Titre</th>
                            <th>Image d'arrière-plan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pageSettings as $setting)
                            <tr>
                                <td>{{ $pages[$setting->page_name] ?? $setting->page_name }}</td>
                                <td>{{ $setting->hero_title }}</td>
                                <td>
                                    @if($setting->hero_background)
                                        <img src="{{ asset('storage/' . $setting->hero_background) }}" 
                                             alt="Background" 
                                             class="img-thumbnail"
                                             style="max-height: 50px;">
                                    @else
                                        <span class="text-muted">Aucune image</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.page-settings.edit', $setting->id) }}" 
                                       class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <form action="{{ route('admin.page-settings.destroy', $setting->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce paramètre de page ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ms-1">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Aucun paramètre de page trouvé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
