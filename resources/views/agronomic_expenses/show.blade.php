@extends('layouts.panel')
@section('title', 'Agronomic_expense/Show')

@section('content')
    <div class="col-xl-12 order-xl-1 show-con">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-newspaper"></i> Ver Gastos Agronomicos</h3>
                    </div>
                    <div class="col-4 button-show text-right">
                        <a href="{{ route('agronomic_expenses.index') }}" class="btn btn-sm btn-show btn-primary btn-mostrar"><i class=" "></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Información del Gastos Agronomicos</h6>
                <div class="pl-lg-4">
                    <div class="row row-show">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="expense_type"><i class="fas fa-user-circle"></i>
                                    Tipo de Gasto</label>
                                <p>{{ $agronomic_expenses->expense_type }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="description"><i class="fas fa-user-alt"></i>
                                    Descripcion</label>
                                <p>{{ $agronomic_expenses->description }}</p>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
@endsection
