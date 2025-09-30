@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registros de Siembra</h1>

    <a href="{{ route('sowings.create') }}" class="btn btn-primary mb-3">
        Registrar Nueva Siembra
    </a>

    @if ($sowings->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cultivo</th>
                    <th>Fecha Siembra</th>
                    <th>Tipo Semilla</th>
                    <th>Área Sembrada</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sowings as $sowing)
                    <tr>
                        <td>{{ $sowing->sowing_id }}</td>
                        {{-- ASUNCIÓN: Usamos la relación 'crops' --}}
                        <td>{{ $sowing->crops->name ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($sowing->sowing_date)->format('d/m/Y') }}</td>
                        <td>{{ $sowing->crap_type }}</td>
                        <td>{{ number_format($sowing->area_sown, 2) }}</td>
                        <td>{{ $sowing->status }}</td>
                        <td>
                            <a href="{{ route('sowings.show', $sowing) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('sowings.edit', $sowing) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('sowings.destroy', $sowing) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $sowings->links() }} --}}

    @else
        <p class="alert alert-info">No hay registros de siembra.</p>
    @endif
</div>
@endsection