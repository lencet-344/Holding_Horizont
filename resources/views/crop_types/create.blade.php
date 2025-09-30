@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Crear Nuevo Tipo de Cultivo</h1>

    <form action="{{ route('crop_types.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE --}}
        {{-- Nota: No pasamos ninguna variable ya que es una creación --}}
        @include('crop_types._form') 

        <button type="submit" class="btn btn-success">Guardar Tipo de Cultivo</button>
        <a href="{{ route('crop_types.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection