@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Propietario: {{ $owner->name }} {{ $owner->last_name }}</h1>

    <form action="{{ route('owners.update', $owner) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $owner --}}
        @include('owners.form', ['owner' => $owner]) 

        <button type="submit" class="btn btn-warning">Actualizar Propietario</button>
        <a href="{{ route('owners.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection