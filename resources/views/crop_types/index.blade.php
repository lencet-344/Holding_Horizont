@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Tipos de Cultivo</h1>

    <a href="{{ route('crop_types.create') }}" class="btn btn-primary mb-3">
        Crear Nuevo Tipo
    </a>

    @if ($cropTypes->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cropTypes as $cropType)
                    <tr>
                        <td>{{ $cropType->crop_type_id }}</td>
                        <td>{{ $cropType->name }}</td>
                        <td>{{ Str::limit($cropType->description, 50) }}</td>
                        <td>
                            <a href="{{ route('crop_types.show', $cropType) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('crop_types.edit', $cropType) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('crop_types.destroy', $cropType) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este tipo de cultivo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $cropTypes->links() }} --}}

    @else
        <p class="alert alert-info">No hay tipos de cultivo registrados.</p>
    @endif
</div>
@endsection