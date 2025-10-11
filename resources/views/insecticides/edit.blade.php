@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Insecticida: {{ $insecticide->name }}</h1>

    <form action="{{ route('insecticides.update', $insecticide) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $insecticide --}}
        @include('insecticides.form', ['insecticide' => $insecticide]) 

        <button type="submit" class="btn btn-warning">Actualizar Insecticida</button>
        <a href="{{ route('insecticides.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection