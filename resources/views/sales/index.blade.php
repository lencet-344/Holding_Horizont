@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Registros de Ventas</h1>

    <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">
        Registrar Nueva Venta
    </a>

    @if ($sales->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Cosecha Origen</th>
                    <th>Monto Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->sale_id }}</td>
                        <td>{{ \Carbon\Carbon::parse($sale->date)->format('d/m/Y') }}</td>
                        {{-- ASUNCIÓN: Usamos las relaciones --}}
                        <td>{{ $sale->customers->name ?? 'N/A' }}</td>
                        <td>#{{ $sale->harvests->harvest_id ?? 'N/A' }} ({{ $sale->harvests->product_name ?? 'N/A' }})</td>
                        <td>${{ number_format($sale->mount, 2) }}</td>
                        <td>
                            <a href="{{ route('sales.show', $sale) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('sales.edit', $sale) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('sales.destroy', $sale) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro de venta?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $sales->links() }} --}}

    @else
        <p class="alert alert-info">No hay registros de ventas.</p>
    @endif
</div>
@endsection