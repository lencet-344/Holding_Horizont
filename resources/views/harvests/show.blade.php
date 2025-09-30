@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle del Registro de Cosecha #{{ $harvest->harvest_id }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID de Registro:</strong> {{ $harvest->harvest_id }}</p>
            <hr>
            
            <p><strong>Cultivo Cosechado:</strong> {{ $harvest->crops->name ?? 'N/A' }}</p>
            <p><strong>Fecha de Cosecha:</strong> {{ \Carbon\Carbon::parse($harvest->harvest_date)->format('d/m/Y') }}</p>
            <hr>
            
            <p><strong>Cantidad Cosechada:</strong> {{ number_format($harvest->quantity, 2) }} {{ $harvest->unit }}</p>
            <p><strong>Costo de la Cosecha:</strong> ${{ number_format($harvest->cost, 2) }}</p>
            <p><strong>Ubicación de Almacenamiento:</strong> {{ $harvest->storage_location }}</p>
            <hr>
            
            <p class="text-muted small">Registrado: {{ $harvest->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('harvests.edit', $harvest) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('harvests.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection