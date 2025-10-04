<h6 class="heading-small text-muted mb-4">Datos de Area</h6>
<div class="pl-lg-4 card-body-form">
    <div class="row container-table">
        {{-- <div class="col-lg-6"> --}}
            <div class="form-group">
                <label class="form-control-label" for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control form-control-alternative input-form"
                    placeholder="Agregar nombre" value="{{ old('name', $areas->name) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="description">Descripcion</label>
                <input type="text" id="description" name="description" class="form-control form-control-alternative input-form"
                    placeholder="Agregar una Descripcion" value="{{ old('description', $areas->description) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="location">Ubicacion</label>
                <input type="text" id="location" name="location" class="form-control form-control-alternative input-form"
                    placeholder="Agregar una Ubicacion" value="{{ old('location', $areas->location) }}">
            </div>

    <div class="form-group button-area asis">
        <button type="submit" class="btn btn-primary btn-secundary" style="width: 30%">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</div>
