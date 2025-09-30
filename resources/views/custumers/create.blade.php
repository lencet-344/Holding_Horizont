@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registrar Nuevo Cliente</h1>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE --}}
        @include('customers._form') 

        <button type="submit" class="btn btn-success">Guardar Cliente</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection