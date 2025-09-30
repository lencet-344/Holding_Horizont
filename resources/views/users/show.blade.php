@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Perfil de Usuario: {{ $user->name }}</h1>
        </div>
        <div class="card-body text-center">
            
            <div class="mb-4">
                <img src="{{ $user->image() }}" alt="Profile Image" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
            </div>

            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <hr>
            
            <p class="text-muted small">Miembro desde: {{ $user->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar Perfil</a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection