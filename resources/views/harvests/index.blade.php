@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Registros de Cosecha</h1>

    <a href="{{ route('harvests.create') }}" class="btn btn-primary mb-3">
        Registrar Nueva Cosecha
    </a>

    @if ($harvests->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cultivo</th>
                    <th>Fecha Cosecha</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                    <th>Ubicación Almacenamiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($harvests as $harvest)
                    <tr>
                        <td>{{ $harvest->harvest_id }}</td>
                        {{-- ASUNCIÓN: Usamos la relación 'crops' del modelo --}}
                        <td>{{ $harvest->crops->name ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($harvest->harvest_date)->format('d/m/Y') }}</td>
                        <td>{{ number_format($harvest->quantity, 2) }} {{ $harvest->unit }}</td>
                        <td>${{ number_format($harvest->cost, 2) }}</td>
                        <td>{{ $harvest->storage_location }}</td>
                        <td>
                            <a href="{{ route('harvests.show', $harvest) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('harvests.edit', $harvest) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('harvests.destroy', $harvest) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro de Cosecha?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $harvests->links() }} --}}

    @else
        <p class="alert alert-info">No hay registros de cosecha.</p>
    @endif
</div>
@endsection