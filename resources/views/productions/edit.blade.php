@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Registro de Producción #{{ $production->production_id }}</h1>

    <form action="{{ route('productions.update', $production) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $production --}}
        @include('productions._form', ['production' => $production]) 

        <button type="submit" class="btn btn-warning">Actualizar Producción</button>
        <a href="{{ route('productions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection