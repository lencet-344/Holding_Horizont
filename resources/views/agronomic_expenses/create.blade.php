@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Crear Nuevo Gasto Agronómico</h1>

    <form action="{{ route('agronomic_expenses.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE --}}
        @include('agronomic_expenses._form') 

        <button type="submit" class="btn btn-success">Guardar Gasto</button>
        <a href="{{ route('agronomic_expenses.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection