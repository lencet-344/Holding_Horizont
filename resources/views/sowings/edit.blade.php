@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Registro de Siembra #{{ $sowing->sowing_id }}</h1>

    <form action="{{ route('sowings.update', $sowing) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $sowing --}}
        @include('sowings._form', ['sowing' => $sowing]) 

        <button type="submit" class="btn btn-warning">Actualizar Siembra</button>
        <a href="{{ route('sowings.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection