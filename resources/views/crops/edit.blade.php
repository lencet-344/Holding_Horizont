@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Cultivo: {{ $crop->name }}</h1>

    <form action="{{ route('crops.update', $crop) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $crop, $areas y $cropTypes --}}
        @include('crops.form', ['crop' => $crop]) 

        <button type="submit" class="btn btn-warning">Actualizar Cultivo</button>
        <a href="{{ route('crops.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection