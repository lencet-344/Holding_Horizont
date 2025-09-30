@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Registro de Venta #{{ $sale->sale_id }}</h1>

    <form action="{{ route('sales.update', $sale) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $sale --}}
        @include('sales._form', ['sale' => $sale]) 

        <button type="submit" class="btn btn-warning">Actualizar Venta</button>
        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection