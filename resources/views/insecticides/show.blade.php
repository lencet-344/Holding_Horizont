@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle del Insecticida: {{ $insecticide->name }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID de Producto:</strong> {{ $insecticide->insecticide_id }}</p>
            <hr>
            
            <p><strong>Nombre Comercial:</strong> {{ $insecticide->name }}</p>
            <p><strong>Tipo:</strong> {{ $insecticide->type_insecticide }}</p>
            <p><strong>Ingrediente Activo:</strong> {{ $insecticide->active_ingredient }}</p>
            <hr>
            
            <h4>Información de Uso</h4>
            <p><strong>Dosis Recomendada:</strong> {{ $insecticide->recomended_dose }} {{ $insecticide->measure }}</p>
            <p><strong>Cultivo Principal:</strong> {{ $insecticide->crops->name ?? 'Genérico' }}</p>
            
            @if ($insecticide->technical_sheel)
                <p><strong>Ficha Técnica:</strong> <a href="{{ $insecticide->technical_sheel }}" target="_blank">Ver Enlace</a></p>
            @endif
            <hr>

            <p class="text-muted small">Registrado: {{ $insecticide->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('insecticides.edit', $insecticide) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('insecticides.index') }}" class="btn btn-secondary">Volver al Inventario</a>
        </div>
    </div>
</div>
@endsection