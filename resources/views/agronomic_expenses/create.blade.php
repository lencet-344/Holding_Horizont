@extends('layouts.panel')
@section('title', 'Agronomic_expense/Create')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card shadow">
            <div class="card-header bg-white border-0">
                <div class="row-header align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Registrar Tipo de Gastos</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('agronomic_expenses.index') }}" class="btn btn-sm btn-index btn-mostrar"><i
                                class="fas fa-arrow-left"></i>
                            Volver</a> 
                    </div>
                </div>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ route('agronomic_expenses.store') }}" method="POST">
                    @csrf
                    @include('agronomic_expenses.form')
                </form>
            </div>
        </div>
    </div>
@endsection
