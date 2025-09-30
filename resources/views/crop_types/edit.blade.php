@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Tipo de Cultivo: {{ $cropType->name }}</h1>

    {{-- Usamos la clave primaria 'crop_type_id' si el modelo no usa 'id' --}}
    <form action="{{ route('crop_types.update', $cropType) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO y le pasamos la variable $cropType --}}
        @include('crop_types._form', ['cropType' => $cropType]) 

        <button type="submit" class="btn btn-warning">Actualizar Tipo</button>
        <a href="{{ route('crop_types.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection