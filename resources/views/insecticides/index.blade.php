@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Inventario de Insecticidas</h1>

    <a href="{{ route('insecticides.create') }}" class="btn btn-primary mb-3">
        Registrar Nuevo Producto
    </a>

    @if ($insecticides->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ingrediente Activo</th>
                    <th>Dosis</th>
                    <th>Cultivo Principal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($insecticides as $insecticide)
                    <tr>
                        <td>{{ $insecticide->insecticide_id }}</td>
                        <td>{{ $insecticide->name }}</td>
                        <td>{{ $insecticide->active_ingredient }}</td>
                        <td>{{ $insecticide->recomended_dose }} {{ $insecticide->measure }}</td>
                        {{-- ASUNCIÓN: Usamos la relación 'crops' del modelo --}}
                        <td>{{ $insecticide->crops->name ?? 'Genérico' }}</td>
                        <td>
                            <a href="{{ route('insecticides.show', $insecticide) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('insecticides.edit', $insecticide) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('insecticides.destroy', $insecticide) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este Insecticida?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $insecticides->links() }} --}}

    @else
        <p class="alert alert-info">No hay insecticidas registrados en el inventario.</p>
    @endif
</div>
@endsection