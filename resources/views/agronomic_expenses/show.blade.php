@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle del Gasto Agronómico: {{ $expense->expense_type }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID:</strong> {{ $expense->agronomic_expense_id }}</p>
            <hr>
            
            <p><strong>Tipo de Gasto:</strong> {{ $expense->expense_type }}</p>
            <hr>
            
            <p><strong>Descripción:</strong></p>
            <p class="card-text">{{ $expense->description }}</p>
            <hr>
            
            {{-- Puedes añadir más campos aquí, como fechas de creación/actualización --}}
            <p class="text-muted small">Creado: {{ $expense->created_at->format('d/m/Y H:i') }}</p>
            <p class="text-muted small">Última Actualización: {{ $expense->updated_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            {{-- Enlace para editar --}}
            <a href="{{ route('agronomic_expenses.edit', $expense) }}" class="btn btn-warning">Editar</a>
            
            {{-- Enlace para volver a la lista --}}
            <a href="{{ route('agronomic_expenses.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection