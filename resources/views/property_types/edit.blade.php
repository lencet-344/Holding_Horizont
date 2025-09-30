@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Tipo de Propiedad: {{ $propertyType->name }}</h1>

    <form action="{{ route('property_types.update', $propertyType) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $propertyType --}}
        @include('property_types._form', ['propertyType' => $propertyType]) 

        <button type="submit" class="btn btn-warning">Actualizar Tipo</button>
        <a href="{{ route('property_types.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection