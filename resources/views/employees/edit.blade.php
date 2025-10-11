@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Empleado: {{ $employee->name }} {{ $employee->last_name }}</h1>

    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $employee --}}
        @include('employees.form', ['employee' => $employee]) 

        <button type="submit" class="btn btn-warning">Actualizar Empleado</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection