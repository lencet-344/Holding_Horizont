@extends('layouts.panel')
@section('title', 'Agronomic_expense/Update')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Actualizar Tipos de Gastos</h3>
                    </div>
                    <div class="col-4 text-right button-show">
                        <a href="{{ route('agronomic_expenses.index') }}" class="btn btn-sm btn-primary btn-show btn-mostrar"><i
                                class="fas fa-arrow-left"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ route('agronomic_expenses.update', $agronomic_expenses->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('agronomic_expenses.form')
                </form>
            </div>
        </div>
    </div>
@endsection
