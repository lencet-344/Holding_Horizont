@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Finca: {{ $farm->name }}</h1>

    <form action="{{ route('farms.update', $farm) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $farm --}}
        @include('farms._form', ['farm' => $farm]) 

        <button type="submit" class="btn btn-warning">Actualizar Finca</button>
        <a href="{{ route('farms.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection