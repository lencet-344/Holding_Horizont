@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registrar Nueva Siembra</h1>

    <form action="{{ route('sowings.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. --}}
        @include('sowings._form') 

        <button type="submit" class="btn btn-success">Guardar Siembra</button>
        <a href="{{ route('sowings.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection