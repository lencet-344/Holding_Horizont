@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle de Tipo de Cultivo: {{ $cropType->name }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID:</strong> {{ $cropType->crop_type_id }}</p>
            <hr>
            
            <p><strong>Nombre:</strong> {{ $cropType->name }}</p>
            <hr>
            
            <p><strong>Descripción:</strong></p>
            <p>{{ $cropType->description }}</p>
            <hr>
            
            <p class="text-muted small">Creado: {{ $cropType->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('crop_types.edit', $cropType) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('crop_types.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection