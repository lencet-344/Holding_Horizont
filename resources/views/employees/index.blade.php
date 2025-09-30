@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Empleados</h1>

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">
        Registrar Nuevo Empleado
    </a>

    @if ($employees->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Cédula</th>
                    <th>Email</th>
                    <th>Área Asignada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->employee_id }}</td>
                        <td>{{ $employee->name }} {{ $employee->last_name }}</td>
                        <td>{{ $employee->identification_card }}</td>
                        <td>{{ $employee->email }}</td>
                        {{-- Usamos la relación 'areas' definida en el modelo --}}
                        <td>{{ $employee->areas->name ?? 'Sin asignar' }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este Empleado?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $employees->links() }} --}}

    @else
        <p class="alert alert-info">No hay empleados registrados.</p>
    @endif
</div>
@endsection