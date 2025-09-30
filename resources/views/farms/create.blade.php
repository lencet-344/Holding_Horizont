@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registrar Nueva Finca</h1>

    <form action="{{ route('farms.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. ASUMIMOS que el controlador pasa la variable $propertyTypes --}}
        @include('farms._form') 

        <button type="submit" class="btn btn-success">Guardar Finca</button>
        <a href="{{ route('farms.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection