@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle de la Finca: {{ $farm->name }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID:</strong> {{ $farm->farm_id }}</p>
            <hr>
            
            <p><strong>Nombre:</strong> {{ $farm->name }}</p>
            <p><strong>Extensión:</strong> {{ $farm->extension }} Hectáreas</p>
            <p><strong>Tipo de Propiedad:</strong> {{ $farm->property_types->name ?? 'N/A' }}</p>
            <hr>
            
            <h4>Información de Contacto y Ubicación</h4>
            <p><strong>Teléfono:</strong> {{ $farm->telephone }}</p>
            <p><strong>Dirección:</strong> {{ $farm->address }}</p>
            <p><strong>Referencia de Ubicación:</strong> {{ $farm->location }}</p>
            <p><strong>Ubicación Geográfica:</strong> {{ $farm->municipaly }}, {{ $farm->departament }}, {{ $farm->state }}</p>
            <hr>

            {{-- Aquí se listaría las Áreas relacionadas si lo necesitaras --}}
            {{--
            <h5>Áreas Pertenecientes ({{ $farm->areas->count() }})</h5>
            <ul>
                @foreach ($farm->areas as $area)
                    <li>{{ $area->name }}</li>
                @endforeach
            </ul>
            --}}

            <p class="text-muted small">Creado: {{ $farm->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('farms.edit', $farm) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('farms.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection