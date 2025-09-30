@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registros de Preparación de Cultivos</h1>

    <a href="{{ route('preparations.create') }}" class="btn btn-primary mb-3">
        Registrar Nueva Preparación
    </a>

    @if ($preparations->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cultivo</th>
                    <th>Tipo</th>
                    <th>Inicio</th>
                    <th>Horas Labor</th>
                    <th>Costo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preparations as $preparation)
                    <tr>
                        <td>{{ $preparation->preparation_id }}</td>
                        {{-- ASUNCIÓN: Usamos la relación 'crops' --}}
                        <td>{{ $preparation->crops->name ?? 'N/A' }}</td>
                        <td>{{ $preparation->type_preparation }}</td>
                        <td>{{ \Carbon\Carbon::parse($preparation->star_date)->format('d/m/Y') }}</td>
                        <td>{{ $preparation->labor_hours }} hrs</td>
                        <td>${{ number_format($preparation->cost, 2) }}</td>
                        <td>
                            <a href="{{ route('preparations.show', $preparation) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('preparations.edit', $preparation) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('preparations.destroy', $preparation) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $preparations->links() }} --}}

    @else
        <p class="alert alert-info">No hay registros de preparación de terreno.</p>
    @endif
</div>
@endsection