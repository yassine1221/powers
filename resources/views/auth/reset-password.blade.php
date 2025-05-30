@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Définir un nouveau mot de passe</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-3">
            <label for="email">Adresse e-mail</label>
            <input 
                type="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email', $email) }}" 
                required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password">Nouveau mot de passe</label>
            <input 
                type="password" 
                name="password" 
                class="form-control @error('password') is-invalid @enderror" 
                required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input 
                type="password" 
                name="password_confirmation" 
                class="form-control" 
                required>
        </div>

        <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
    </form>
</div>
@endsection
