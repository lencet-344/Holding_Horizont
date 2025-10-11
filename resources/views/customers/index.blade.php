@extends('layouts.panel')
@section('title', 'Customer')

@section('content')
    <div class="row">
        <div class="col col-table">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Estudiantes</h3>
                        <a href="{{ route('customers.create') }}" class="btn btn-index">
                            <i class="fas fa-plus"></i> Agregar nuevo Cliente
                        </a>
                    </div>
                </div>
                <div class="table-responsive RESPONSIVE-TABLE">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-id-card"></i> ID</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Nombre</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Apellido</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Edad</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Genero</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Correo Electronico</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Telefono</th>
                                
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $customer->id }} </span>
                                    </td>

                                    <td>
                                        {{ $customer->name }}
                                    </td>

                                    <td>
                                        {{ $customer->last_name }}
                                    </td>

                                    <td>
                                        {{ $customer->age }}
                                    </td>

                                    <td>
                                        {{ $customer->gender }}
                                    </td>

                                    <td>
                                        {{ $customer->email }}
                                    </td>

                                    <td>
                                        {{ $customer->telephone }}
                                    </td>

                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('customers.show', $customer) }}" class="btn btn-primary btn-sm btn-mostrar"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('customers.edit', $customer) }}" class="btn btn-info btn-sm"
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
                        {{ $customers->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
