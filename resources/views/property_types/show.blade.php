@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle de Tipo de Propiedad: {{ $propertyType->name }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID:</strong> {{ $propertyType->property_type_id }}</p>
            <hr>
            
            <p><strong>Nombre:</strong> {{ $propertyType->name }}</p>
            <hr>
            
            <p><strong>Descripción:</strong></p>
            <p>{{ $propertyType->description }}</p>
            <hr>
            
            <p class="text-muted small">Creado: {{ $propertyType->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('property_types.edit', $propertyType) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('property_types.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection