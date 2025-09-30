@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Propietarios</h1>

    <a href="{{ route('owners.create') }}" class="btn btn-primary mb-3">
        Registrar Nuevo Propietario
    </a>

    @if ($owners->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Cédula</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($owners as $owner)
                    <tr>
                        <td>{{ $owner->owner_id }}</td>
                        <td>{{ $owner->name }} {{ $owner->last_name }}</td>
                        <td>{{ $owner->identification_card }}</td>
                        <td>{{ $owner->email }}</td>
                        <td>{{ $owner->telephone }}</td>
                        <td>
                            <a href="{{ route('owners.show', $owner) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('owners.edit', $owner) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('owners.destroy', $owner) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este Propietario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $owners->links() }} --}}

    @else
        <p class="alert alert-info">No hay propietarios registrados.</p>
    @endif
</div>
@endsection