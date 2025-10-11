@extends('layouts.panel')
@section('title', 'Area')

@section('content')
    <div class="row">
        <div class="col col-table">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Areas</h3>
                        <a href="{{ route('areas.create') }}" class="btn btn-index">
                            <i class="fas fa-plus"></i> Agregar nueva Area
                        </a>
                    </div>
                </div>
                <div class="table-responsive RESPONSIVE-TABLE">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-id-card"></i> ID</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Nombre</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Descripcion</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Ubicacion</th>

                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $area)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $area->id }} </span>
                                    </td>

                                    <td>
                                        {{ $area->name }}
                                    </td>

                                    <td>
                                        {{ $area->description }}
                                    </td>

                                    <td>
                                        {{ $area->location }}
                                    </td>

                                    
                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('areas.show', $area) }}" class="btn btn-primary btn-sm btn-mostrar"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('areas.edit', $area) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="..." class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                        {{ $areas->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
