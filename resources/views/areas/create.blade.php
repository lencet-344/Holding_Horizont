@extends('layouts.panel')
@section('title', 'Area/Create')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card shadow">
            <div class="card-header bg-white border-0">
                <div class="row-header align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Registrar Area</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('areas.index') }}" class="btn btn-sm btn-index btn-mostrar"><i
                                class="fas fa-arrow-left"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ route('areas.store') }}" method="POST">
                    @csrf
                    @include('areas.form')
                </form>
            </div>
        </div>
    </div>
@endsection
