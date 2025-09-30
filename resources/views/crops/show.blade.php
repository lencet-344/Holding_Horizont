@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle del Cultivo: {{ $crop->name }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID:</strong> {{ $crop->id }}</p>
            <hr>
            
            <p><strong>Nombre:</strong> {{ $crop->name }}</p>
            <p><strong>Fecha de Siembra:</strong> {{ \Carbon\Carbon::parse($crop->planting_date)->format('d/m/Y') }}</p>
            <p><strong>Rendimiento Esperado:</strong> {{ $crop->expected_yield }}</p>
            <hr>
            
            {{-- Muestra la información de las relaciones --}}
            <p><strong>Tipo de Cultivo:</strong> {{ $crop->crop_type_name->name ?? 'N/A' }}</p>
            <p><strong>Área / Lote:</strong> {{ $crop->area_name->name ?? 'N/A' }}</p>
            <p><strong>Perteneciente a Finca:</strong> {{ $crop->area_name->farm->name ?? 'N/A' }}</p>
            <hr>

            <p class="text-muted small">Creado: {{ $crop->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('crops.edit', $crop) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('crops.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection