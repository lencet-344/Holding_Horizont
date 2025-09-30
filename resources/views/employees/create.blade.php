@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registrar Nuevo Empleado</h1>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. --}}
        {{-- ASUMIMOS que el controlador pasa la variable $areas --}}
        @include('employees._form') 

        <button type="submit" class="btn btn-success">Guardar Empleado</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection