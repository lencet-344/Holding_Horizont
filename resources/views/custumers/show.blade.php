@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle del Cliente: {{ $customer->name }} {{ $customer->last_name }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID:</strong> {{ $customer->customer_id }}</p>
            <hr>
            
            <p><strong>Nombre:</strong> {{ $customer->name }}</p>
            <p><strong>Apellido:</strong> {{ $customer->last_name }}</p>
            <p><strong>Edad:</strong> {{ $customer->age }}</p>
            <p><strong>Género:</strong> {{ $customer->gender }}</p>
            <hr>
            
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Teléfono:</strong> {{ $customer->telephone }}</p>
            <hr>
            
            <p class="text-muted small">Creado: {{ $customer->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection