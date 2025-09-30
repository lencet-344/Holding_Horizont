@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalle del Empleado: {{ $employee->name }} {{ $employee->last_name }}</h1>
        </div>
        <div class="card-body">
            
            <p><strong>ID:</strong> {{ $employee->employee_id }}</p>
            <hr>
            
            <p><strong>Nombre Completo:</strong> {{ $employee->name }} {{ $employee->last_name }}</p>
            <p><strong>Cédula / Identificación:</strong> {{ $employee->identification_card }}</p>
            <p><strong>Fecha de Contratación:</strong> {{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}</p>
            <hr>
            
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Teléfono:</strong> {{ $employee->telephone }}</p>
            <p><strong>Dirección:</strong> {{ $employee->address }}</p>
            <hr>
            
            {{-- Muestra la relación con el área --}}
            <p><strong>Área Asignada:</strong> {{ $employee->areas->name ?? 'Sin asignar' }}</p>
            <p class="text-muted small">Creado: {{ $employee->created_at->format('d/m/Y H:i') }}</p>

        </div>
        <div class="card-footer">
            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Volver al Listado</a>
        </div>
    </div>
</div>
@endsection