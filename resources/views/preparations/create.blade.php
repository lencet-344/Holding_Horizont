@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registrar Preparación de Terreno/Área</h1>

    <form action="{{ route('preparations.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. --}}
        @include('preparations._form') 

        <button type="submit" class="btn btn-success">Guardar Preparación</button>
        <a href="{{ route('preparations.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection