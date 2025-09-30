@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registrar Nueva Producción</h1>

    <form action="{{ route('productions.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. --}}
        @include('productions._form') 

        <button type="submit" class="btn btn-success">Guardar Producción</button>
        <a href="{{ route('productions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection