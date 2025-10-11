@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Registro de Cosecha #{{ $harvest->harvest_id }}</h1>

    <form action="{{ route('harvests.update', $harvest) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $harvest --}}
        @include('harvests.form', ['harvest' => $harvest]) 

        <button type="submit" class="btn btn-warning">Actualizar Cosecha</button>
        <a href="{{ route('harvests.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection