@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registros de Producción Históricos</h1>

    <a href="{{ route('productions.create') }}" class="btn btn-primary mb-3">
        Registrar Nueva Producción
    </a>

    @if ($productions->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Área</th>
                    <th>Tipo Cultivo</th>
                    <th>Calidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productions as $production)
                    <tr>
                        <td>{{ $production->production_id }}</td>
                        <td>{{ \Carbon\Carbon::parse($production->date_production)->format('d/m/Y') }}</td>
                        {{-- ASUNCIÓN: Usamos las relaciones --}}
                        <td>{{ $production->areas->name ?? 'N/A' }}</td>
                        <td>{{ $production->crop_types->name ?? 'N/A' }}</td>
                        <td>{{ $production->quality }}</td>
                        <td>
                            <a href="{{ route('productions.show', $production) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('productions.edit', $production) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('productions.destroy', $production) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $productions->links() }} --}}

    @else
        <p class="alert alert-info">No hay registros de producción históricos.</p>
    @endif
</div>
@endsection