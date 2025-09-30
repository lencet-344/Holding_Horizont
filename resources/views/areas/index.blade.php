@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Áreas</h1>

    <a href="{{ route('areas.create') }}" class="btn btn-primary mb-3">
        Crear Nueva Área
    </a>

    @if ($areas->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Finca (Farm)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area)
                    <tr>
                        <td>{{ $area->id }}</td>
                        <td>{{ $area->name }}</td>
                        {{-- ASUNCIÓN: El modelo tiene la relación 'farm()' definida --}}
                        <td>{{ $area->farm->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('areas.show', $area) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('areas.edit', $area) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('areas.destroy', $area) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $areas->links() }} --}}

    @else
        <p class="alert alert-info">No hay áreas registradas.</p>
    @endif
</div>
@endsection