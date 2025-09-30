@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Clientes</h1>

    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">
        Registrar Nuevo Cliente
    </a>

    @if ($customers->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Edad</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->customer_id }}</td>
                        <td>{{ $customer->name }} {{ $customer->last_name }}</td>
                        <td>{{ $customer->age }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->telephone }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este Cliente?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $customers->links() }} --}}

    @else
        <p class="alert alert-info">No hay clientes registrados.</p>
    @endif
</div>
@endsection