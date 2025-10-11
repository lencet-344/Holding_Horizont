@extends('layouts.panel')
@section('title', 'Farm/Show')

@section('content')
    <div class="col-xl-12 order-xl-1 show-con">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-newspaper"></i> Ver Finca</h3>
                    </div>
                    <div class="col-4 button-show text-right">
                        <a href="{{ route('farms.index') }}" class="btn btn-sm btn-show btn-primary btn-mostrar"><i class=" "></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Información de la Finca</h6>
                <div class="pl-lg-4">
                    <div class="row row-show">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="name"><i class="fas fa-user-circle"></i>
                                    Nombre</label>
                                <p>{{ $farms->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="extensions"><i class="fas fa-user-alt"></i>
                                    Extensiones</label>
                                <p>{{ $farms->extensions }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="location"><i class="fas fa-portrait"></i>
                                    Ubicacion</label>
                                <p>{{ $farms->location }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="departament"><i class="fas fa-map"></i>
                                    Departamento</label>
                                <p>{{ $farms->departament }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="municipaly"><i class="fas fa-phone"></i>
                                    Municipio</label>
                                <p>{{ $farms->municipaly }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="state"><i class="fas fa-envelope-square"></i>
                                    Estado</label>
                                <p>{{ $farms->state }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="telephone"><i class="fas fa-calendar-check"></i>
                                    Telefono</label>
                                <p>{{ $farms->telephone }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="address"><i class="fas fa-calendar-check"></i>
                                    Direccion</label>
                                <p>{{ $farms->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
