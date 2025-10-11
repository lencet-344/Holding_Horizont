@extends('layouts.panel')
@section('title', 'Farm')

@section('content')
    <div class="row">
        <div class="col col-table">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Finca</h3>
                        <a href="{{ route('students.create') }}" class="btn btn-index">
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
                                <th scope="col"><i class="fas fa-user-circle"></i>Extensiones </th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Ubicacion</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Departamento</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Municipio</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Estado</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Telefono</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Direccion</th>
                                
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($farms as $farm)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $farm->id }} </span>
                                    </td>

                                    <td>
                                        {{ $farm->name }}
                                    </td>

                                    <td>
                                        {{ $farm->extensions }}
                                    </td>

                                    <td>
                                        {{ $area->location }}
                                    </td>

                                    <td>
                                        {{ $area->departament }}
                                    </td>

                                    <td>
                                        {{ $area->municipaly }}
                                    </td>

                                    <td>
                                        {{ $area->state }}
                                    </td>

                                    <td>
                                        {{ $area->telephone }}
                                    </td>

                                    <td>
                                        {{ $area->address }}
                                    </td>

                                    
                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('farms.show', $farm) }}" class="btn btn-primary btn-sm btn-mostrar"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('farms.edit', $farm) }}" class="btn btn-info btn-sm"
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
                        {{ $farms->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
