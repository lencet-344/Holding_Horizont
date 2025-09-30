:Listado de Tipos de Propiedad:index.blade.php
@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Tipos de Propiedad</h1>

    <a href="{{ route('property_types.create') }}" class="btn btn-primary mb-3">
        Crear Nuevo Tipo
    </a>

    @if ($propertyTypes->count())
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
                @foreach ($propertyTypes as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ Str::limit($type->description, 50) }}</td>
                        <td>
                            <a href="{{ route('property_types.show', $type) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('property_types.edit', $type) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('property_types.destroy', $type) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este tipo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $propertyTypes->links() }} --}}

    @else
        <p class="alert alert-info">No hay tipos de propiedad registrados.</p>
    @endif
</div>
@endsection