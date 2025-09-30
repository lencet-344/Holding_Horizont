@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Gastos Agronómicos</h1>

    {{-- Botón para ir a la vista de creación --}}
    <a href="{{ route('agronomic_expenses.create') }}" class="btn btn-primary mb-3">
        Registrar Nuevo Gasto
    </a>

    @if ($expenses->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Gasto</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                    <tr>
                        <td>{{ $expense->agronomic_expense_id }}</td>
                        <td>{{ $expense->expense_type }}</td>
                        <td>{{ $expense->description }}</td>
                        <td>
                            {{-- Enlace para ver el detalle (Show) --}}
                            <a href="{{ route('agronomic_expenses.show', $expense) }}" class="btn btn-info btn-sm">Ver</a>
                            
                            {{-- Enlace para editar --}}
                            <a href="{{ route('agronomic_expenses.edit', $expense) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            {{-- Formulario para eliminar (Destroy) --}}
                            <form action="{{ route('agronomic_expenses.destroy', $expense) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este gasto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Muestra enlaces de paginación si el controlador los envía --}}
        {{-- {{ $expenses->links() }} --}}

    @else
        <p class="alert alert-info">No hay gastos agronómicos registrados.</p>
    @endif
</div>
@endsection