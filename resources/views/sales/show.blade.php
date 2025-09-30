@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle de la Venta #{{ $sale->sale_id }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID de Venta:</strong> {{ $sale->sale_id }}</p>
            <p><strong>Fecha de Venta:</strong> {{ \Carbon\Carbon::parse($sale->date)->format('d/m/Y') }}</p>
            <hr>
            
            <h4>Información Comercial</h4>
            <p><strong>Cliente:</strong> {{ $sale->customers->name ?? 'N/A' }}</p>
            <p><strong>Producto de Cosecha:</strong> #{{ $sale->harvests->harvest_id ?? 'N/A' }} ({{ $sale->harvests->product_name ?? 'N/A' }})</p>
            <p><strong>Cantidad Vendida:</strong> {{ number_format($sale->quantity, 2) }} {{ $sale->harvests->unit ?? 'unidades' }}</p>
            <p><strong>Monto Total de Venta:</strong> <h2>${{ number_format($sale->mount, 2) }}</h2></p>
            <hr>

            <h4>Descripción y Notas</h4>
            <p>{{ $sale->description ?? 'Sin descripción.' }}</p>
            <hr>
            
            <p class="text-muted small">Registrado en sistema: {{ $sale->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('sales.edit', $sale) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Volver al Listado de Ventas</a>
        </div>
    </div>
</div>
@endsection