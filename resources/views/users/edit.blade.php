@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Usuario: {{ $user->name }}</h1>

    {{-- ES IMPORTANTE EL enctype="multipart/form-data" para subir archivos --}}
    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $user --}}
        @include('users._form', ['user' => $user]) 

        <button type="submit" class="btn btn-warning">Actualizar Usuario</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection