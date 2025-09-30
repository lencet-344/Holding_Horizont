@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle del Área: {{ $area->name }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID:</strong> {{ $area->id }}</p>
            <hr>
            
            <p><strong>Nombre:</strong> {{ $area->name }}</p>
            <hr>
            
            {{-- ASUNCIÓN: El modelo tiene la relación 'farm()' definida --}}
            <p><strong>Finca (Farm):</strong> {{ $area->farm->name ?? 'N/A' }}</p>
            <hr>
            
            <p class="text-muted small">Creado: {{ $area->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('areas.edit', $area) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('areas.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection