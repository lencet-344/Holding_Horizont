@extends('layouts.panel')
@section('title', 'Crop_type/Show')

@section('content')
    <div class="col-xl-12 order-xl-1 show-con">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-newspaper"></i> Ver Tipo de Cultivo</h3>
                    </div>
                    <div class="col-4 button-show text-right">
                        <a href="{{ route('crop_types.index') }}" class="btn btn-sm btn-show btn-primary btn-mostrar"><i class=" "></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Información del Tipo de cultivo</h6>
                <div class="pl-lg-4">
                    <div class="row row-show">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="name"><i class="fas fa-user-circle"></i>
                                    Nombre</label>
                                <p>{{ $crop_types->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="description"><i class="fas fa-user-alt"></i>
                                    Descripcion</label>
                                <p>{{ $crop_types->description }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
