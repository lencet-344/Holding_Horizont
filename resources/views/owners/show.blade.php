@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle del Propietario: {{ $owner->name }} {{ $owner->last_name }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID:</strong> {{ $owner->owner_id }}</p>
            <hr>
            
            <p><strong>Nombre Completo:</strong> {{ $owner->name }} {{ $owner->last_name }}</p>
            <p><strong>Cédula / Identificación:</strong> {{ $owner->identification_card }}</p>
            <hr>
            
            <p><strong>Email:</strong> {{ $owner->email }}</p>
            <p><strong>Teléfono:</strong> {{ $owner->telephone }}</p>
            <p><strong>Dirección:</strong> {{ $owner->address }}</p>
            <hr>
            
            <p class="text-muted small">Registrado: {{ $owner->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('owners.edit', $owner) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('owners.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection