@extends('layouts.panel')
@section('title', 'Custumer/Show')

@section('content')
    <div class="col-xl-12 order-xl-1 show-con">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-newspaper"></i> Ver Clientes</h3>
                    </div>
                    <div class="col-4 button-show text-right">
                        <a href="{{ route('custumers.index') }}" class="btn btn-sm btn-show btn-primary btn-mostrar"><i class=" "></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Información del Cliente</h6>
                <div class="pl-lg-4">
                    <div class="row row-show">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="name"><i class="fas fa-user-circle"></i>
                                    Nombre</label>
                                <p>{{ $custumers->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="last_name"><i class="fas fa-user-alt"></i>
                                    Apellido</label>
                                <p>{{ $custumers->last_name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="age"><i class="fas fa-portrait"></i>
                                    Edad</label>
                                <p>{{ $custumers->age }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="gender"><i class="fas fa-map"></i>
                                    Genero</label>
                                <p>{{ $custumers->gender }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="email"><i class="fas fa-phone"></i>
                                Correo Electronico</label>
                                <p>{{ $custumers->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="telephone"><i class="fas fa-envelope-square"></i>
                                    Telefono</label>
                                <p>{{ $custumers->telephone }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
