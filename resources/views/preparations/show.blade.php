@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle de la Preparación: {{ $preparation->type_preparation }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID de Registro:</strong> {{ $preparation->preparation_id }}</p>
            <hr>
            
            <p><strong>Cultivo Asociado:</strong> {{ $preparation->crops->name ?? 'N/A' }}</p>
            <hr>
            
            <h4>Detalles de la Actividad</h4>
            <p><strong>Tipo de Preparación:</strong> {{ $preparation->type_preparation }}</p>
            <p><strong>Período:</strong> Del {{ \Carbon\Carbon::parse($preparation->star_date)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($preparation->end_date)->format('d/m/Y') }}</p>
            <p><strong>Equipo Utilizado:</strong> {{ $preparation->equipment_used }}</p>
            <p><strong>Horas de Mano de Obra:</strong> {{ $preparation->labor_hours }}</p>
            <p><strong>Costo Total:</strong> ${{ number_format($preparation->cost, 2) }}</p>
            <hr>
            
            <p class="text-muted small">Registrado: {{ $preparation->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('preparations.edit', $preparation) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('preparations.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection