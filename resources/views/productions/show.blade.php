@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle de Registro de Producción #{{ $production->production_id }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID de Registro:</strong> {{ $production->production_id }}</p>
            <p><strong>Fecha de Registro:</strong> {{ \Carbon\Carbon::parse($production->date_production)->format('d/m/Y') }}</p>
            <hr>
            
            <h4>Información Principal</h4>
            <p><strong>Área/Parcela:</strong> {{ $production->areas->name ?? 'N/A' }}</p>
            <p><strong>Tipo de Cultivo:</strong> {{ $production->crop_types->name ?? 'N/A' }}</p>
            <p><strong>Calidad Registrada:</strong> {{ $production->quality }}</p>
            <hr>
            
            <h4>Procesos Asociados</h4>
            <p><strong>Cosecha Relacionada:</strong> #{{ $production->harvests->harvest_id ?? 'N/A' }}</p>
            <p><strong>Preparación Relacionada:</strong> #{{ $production->preparations->preparation_id ?? 'N/A' }} ({{ $production->preparations->type_preparation ?? 'N/A' }})</p>
            <p><strong>Siembra Relacionada:</strong> #{{ $production->sowings->sowing_id ?? 'N/A' }} ({{ $production->sowings->seed_type ?? 'N/A' }})</p>
            <hr>

            <h4>Descripción y Notas</h4>
            <p>{{ $production->description ?? 'Sin descripción.' }}</p>
            <hr>
            
            <p class="text-muted small">Creado: {{ $production->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('productions.edit', $production) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('productions.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection