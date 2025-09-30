@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Área: {{ $area->name }}</h1>

    <form action="{{ route('areas.update', $area) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $area --}}
        @include('areas._form', ['area' => $area]) 

        <button type="submit" class="btn btn-warning">Actualizar Área</button>
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection