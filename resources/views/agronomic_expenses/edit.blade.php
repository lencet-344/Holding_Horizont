@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Editar Gasto Agronómico: {{ $expense->expense_type }}</h1>

    <form action="{{ route('agronomic_expenses.update', $expense) }}" method="POST">
        @csrf
        @method('PUT') 
        
        {{-- INCLUIMOS EL FORMULARIO REUTILIZABLE y le pasamos la variable $expense --}}
        @include('agronomic_expenses._form', ['expense' => $expense]) 

        <button type="submit" class="btn btn-warning">Actualizar Gasto</button>
        <a href="{{ route('agronomic_expenses.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection