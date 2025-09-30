@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registrar Nueva Venta</h1>

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE. --}}
        @include('sales._form') 

        <button type="submit" class="btn btn-success">Guardar Venta</button>
        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection