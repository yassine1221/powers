@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Gestion des Utilisateurs</h1>
</div>

<!-- Users Table -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Entreprise</th>
                        <th>Date d'inscription</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->company ?? '-' }}</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td>{{ $user->isAdmin() ? 'Admin' : 'Utilisateur' }}</td>
                        <td>
                            @if($user->is_blocked)
                                <span class="badge bg-danger">Bloqué</span>
                            @else
                                <span class="badge bg-success">Actif</span>
                            @endif
                        </td>
                        <td>
                            @if(!$user->isAdmin())
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.users.toggleBlock', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="btn btn-sm {{ $user->is_blocked ? 'btn-success' : 'btn-warning' }}"
                                    onclick="return confirm('Êtes-vous sûr de vouloir {{ $user->is_blocked ? 'débloquer' : 'bloquer' }} cet utilisateur ?')">
                                    <i class="fas {{ $user->is_blocked ? 'fa-user-check' : 'fa-user-lock' }}"></i>
                                </button>
                            </form>

                            @else
                            <span class="text-muted">Non modifiable</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editUserForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Entreprise</label>
                        <input type="text" class="form-control" name="company">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function editUser(userId) {
    // Get user data and populate modal
    fetch(`/admin/users/${userId}/edit`)
        .then(response => response.json())
        .then(user => {
            document.querySelector('#editUserForm').action = `/admin/users/${userId}`;
            document.querySelector('input[name="name"]').value = user.name;
            document.querySelector('input[name="email"]').value = user.email;
            document.querySelector('input[name="company"]').value = user.company || '';
            
            // Show modal
            new bootstrap.Modal(document.getElementById('editUserModal')).show();
        });
}
</script>
@endsection
