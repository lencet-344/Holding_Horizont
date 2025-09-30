:Crear Tipo de Propiedad:create.blade.php
@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Crear Nuevo Tipo de Propiedad</h1>

    <form action="{{ route('property_types.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE --}}
        @include('property_types._form') 

        <button type="submit" class="btn btn-success">Guardar Tipo</button>
        <a href="{{ route('property_types.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection