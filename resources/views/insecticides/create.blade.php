@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registrar Nuevo Insecticida</h1>

    <form action="{{ route('insecticides.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. --}}
        @include('insecticides.form') 

        <button type="submit" class="btn btn-success">Guardar Insecticida</button>
        <a href="{{ route('insecticides.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection