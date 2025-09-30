@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Crear Nuevo Usuario</h1>

    {{-- ES IMPORTANTE EL enctype="multipart/form-data" para subir archivos --}}
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. --}}
        @include('users._form') 

        <button type="submit" class="btn btn-success">Crear Usuario</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection