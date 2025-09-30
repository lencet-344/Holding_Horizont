@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registrar Nuevo Propietario</h1>

    <form action="{{ route('owners.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. --}}
        @include('owners._form') 

        <button type="submit" class="btn btn-success">Guardar Propietario</button>
        <a href="{{ route('owners.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection