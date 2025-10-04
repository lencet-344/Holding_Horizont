@extends('layouts.panel')
@section('title', 'Agronomic_expense')

@section('content')
    <div class="row">
        <div class="col col-table">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Gastos Agronomicos</h3>
                        <a href="{{ route('students.create') }}" class="btn btn-index">
                            <i class="fas fa-plus"></i> Agregar nuevo Gasto agronomico
                        </a>
                    </div>
                </div>
                <div class="table-responsive RESPONSIVE-TABLE">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-id-card"></i> ID</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Tipo de Gastos</th>
                                <th scope="col"><i class="fas fa-user-circle"></i> Descripcion</th>

                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agronomic_expenses as $agronomic_expense)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $agronomic_expense->id }} </span>
                                    </td>

                                    <td>
                                        {{ $agronomic_expense->expense_type }}
                                    </td>

                                    <td>
                                        {{ $agronomic_expense->description }}
                                    </td>

                                    
                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('agronomic_expenses.show', $agronomic_expense) }}" class="btn btn-primary btn-sm btn-mostrar"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('agronomic_expenses.edit', $agronomic_expense) }}" class="btn btn-info btn-sm"
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
                        {{ $students->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
