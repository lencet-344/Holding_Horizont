@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle de la Siembra #{{ $sowing->sowing_id }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID de Registro:</strong> {{ $sowing->sowing_id }}</p>
            <p><strong>Fecha de Siembra:</strong> {{ \Carbon\Carbon::parse($sowing->sowing_date)->format('d/m/Y') }}</p>
            <hr>
            
            <h4>Información de la Semilla y Área</h4>
            <p><strong>Cultivo Asociado:</strong> {{ $sowing->crops->name ?? 'N/A' }}</p>
            <p><strong>Tipo/Variedad de Semilla:</strong> {{ $sowing->crap_type }}</p>
            <p><strong>Cantidad de Semilla Usada:</strong> {{ number_format($sowing->seed_amount, 2) }}</p>
            <p><strong>Área Sembrada:</strong> {{ number_format($sowing->area_sown, 2) }}</p>
            <hr>
            
            <p><strong>Estado Actual:</strong> <span class="badge bg-primary">{{ $sowing->status }}</span></p>
            <hr>
            
            <p class="text-muted small">Registrado: {{ $sowing->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('sowings.edit', $sowing) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('sowings.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection