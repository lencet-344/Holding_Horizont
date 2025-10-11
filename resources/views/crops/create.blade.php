@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Crear Nuevo Cultivo</h1>

    <form action="{{ route('crops.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. ASUMIMOS que $areas y $cropTypes están disponibles --}}
        @include('crops.form') 

        <button type="submit" class="btn btn-success">Guardar Cultivo</button>
        <a href="{{ route('crops.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection