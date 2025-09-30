@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Cliente: {{ $customer->name }} {{ $customer->last_name }}</h1>

    <form action="{{ route('customers.update', $customer) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $customer --}}
        @include('customers._form', ['customer' => $customer]) 

        <button type="submit" class="btn btn-warning">Actualizar Cliente</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection