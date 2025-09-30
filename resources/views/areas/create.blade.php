@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Crear Nueva Área</h1>

    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE --}}
        @include('areas._form') 

        <button type="submit" class="btn btn-success">Guardar Área</button>
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection