@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Fincas Registradas</h1>

    <a href="{{ route('farms.create') }}" class="btn btn-primary mb-3">
        Registrar Nueva Finca
    </a>

    @if ($farms->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Extensión</th>
                    <th>Tipo Propiedad</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($farms as $farm)
                    <tr>
                        <td>{{ $farm->farm_id }}</td>
                        <td>{{ $farm->name }}</td>
                        <td>{{ $farm->extension }} Ha</td>
                        <td>{{ $farm->property_types->name ?? 'N/A' }}</td>
                        <td>{{ $farm->municipaly }}, {{ $farm->departament }}</td>
                        <td>
                            <a href="{{ route('farms.show', $farm) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('farms.edit', $farm) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('farms.destroy', $farm) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta Finca?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $farms->links() }} --}}

    @else
        <p class="alert alert-info">No hay fincas registradas.</p>
    @endif
</div>
@endsection