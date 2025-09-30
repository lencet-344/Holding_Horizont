@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Preparación: {{ $preparation->type_preparation }}</h1>

    <form action="{{ route('preparations.update', $preparation) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $preparation --}}
        @include('preparations._form', ['preparation' => $preparation]) 

        <button type="submit" class="btn btn-warning">Actualizar Preparación</button>
        <a href="{{ route('preparations.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection