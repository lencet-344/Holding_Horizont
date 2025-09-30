@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Cultivos</h1>

    <a href="{{ route('crops.create') }}" class="btn btn-primary mb-3">
        Registrar Nuevo Cultivo
    </a>

    @if ($crops->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Área / Lote</th>
                    <th>Fecha Siembra</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crops as $crop)
                    <tr>
                        <td>{{ $crop->id }}</td>
                        <td>{{ $crop->name }}</td>
                        {{-- ASUNCIÓN: Usamos las relaciones 'crop_type_name' y 'area_name' del modelo --}}
                        <td>{{ $crop->crop_type_name->name ?? 'N/A' }}</td>
                        <td>{{ $crop->area_name->name ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($crop->planting_date)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('crops.show', $crop) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('crops.edit', $crop) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('crops.destroy', $crop) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este Cultivo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $crops->links() }} --}}

    @else
        <p class="alert alert-info">No hay cultivos registrados.</p>
    @endif
</div>
@endsection