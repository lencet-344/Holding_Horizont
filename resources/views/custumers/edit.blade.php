@extends('layouts.panel')
@section('title', 'Custumer/Update')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Actualizar Clientes</h3>
                    </div>
                    <div class="col-4 text-right button-show">
                        <a href="{{ route('custumers.index') }}" class="btn btn-sm btn-primary btn-show btn-mostrar"><i
                                class="fas fa-arrow-left"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ route('custumers.update', $custumers->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('custumers.form')
                </form>
            </div>
        </div>
    </div>
@endsection
