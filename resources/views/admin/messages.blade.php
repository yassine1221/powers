@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Gestion des Messages</h1>

    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Type de demande</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages ?? [] as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>{{ $message->request_type }}</td>
                            <td>{{ Str::limit($message->message, 30) }}</td>
                            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <select class="form-select form-select-sm" onchange="updateStatus(this, {{ $message->id }})">
                                    <option value="nouveau" {{ $message->status === 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                                    <option value="lu" {{ $message->status === 'lu' ? 'selected' : '' }}>Lu</option>
                                    <option value="traité" {{ $message->status === 'traité' ? 'selected' : '' }}>Traité</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="viewMessage({{ $message->id }})">
                                    Voir
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="deleteMessage({{ $message->id }})">
                                    Supprimer
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Aucun message pour le moment</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- View Message Modal -->
<div class="modal fade" id="viewMessageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails du Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="messageDetails"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Forms -->
<form id="deleteMessageForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<form id="updateStatusForm" method="POST" style="display: none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" id="statusInput">
</form>

@push('scripts')
<script>
function viewMessage(id) {
    const message = @json($messages ?? []).find(m => m.id === id);
    if (message) {
        const details = `
            <p><strong>Nom:</strong> ${message.name}</p>
            <p><strong>Email:</strong> ${message.email}</p>
            <p><strong>Téléphone:</strong> ${message.phone}</p>
            <p><strong>Type de demande:</strong> ${message.request_type}</p>
            <p><strong>Message:</strong></p>
            <p>${message.message}</p>
            <p><strong>Date:</strong> ${new Date(message.created_at).toLocaleString()}</p>
        `;
        document.getElementById('messageDetails').innerHTML = details;
        new bootstrap.Modal(document.getElementById('viewMessageModal')).show();
    }
}

function deleteMessage(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce message ?')) {
        const form = document.getElementById('deleteMessageForm');
        form.action = `/admin/messages/${id}`;
        form.submit();
    }
}

function updateStatus(select, id) {
    const form = document.getElementById('updateStatusForm');
    form.action = `/admin/messages/${id}/status`;
    document.getElementById('statusInput').value = select.value;
    form.submit();
}
</script>
@endpush

@push('styles')
<style>
.card {
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    border: none;
}
.table th {
    background-color: #f8f9fa;
    font-weight: 600;
}
.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}
</style>
@endpush
@endsection
