@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registrar Nueva Cosecha</h1>

    <form action="{{ route('harvests.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. ASUMIMOS que el controlador pasa la variable $crops --}}
        @include('harvests.form') 

        <button type="submit" class="btn btn-success">Guardar Cosecha</button>
        <a href="{{ route('harvests.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection