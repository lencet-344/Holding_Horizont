<h6 class="heading-small text-muted mb-4">Datos de la Finca</h6>
<div class="pl-lg-4 card-body-form">
    <div class="row container-table">
        {{-- <div class="col-lg-6"> --}}
            <div class="form-group">
                <label class="form-control-label" for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control form-control-alternative input-form"
                    placeholder="Agregar nombre" value="{{ old('name', $farms->name) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="extensions">Descripcion</label>
                <input type="text" id="extensions" name="extensions" class="form-control form-control-alternative input-form"
                    placeholder="Agregar Extensiones " value="{{ old('extensions', $farms->extensions) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="location">Ubicacion</label>
                <input type="text" id="location" name="location" class="form-control form-control-alternative input-form"
                    placeholder="Agregar una Ubicacion" value="{{ old('location', $farms->location) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="departament">Departamento</label>
                <input type="text" id="departament" name="departament" class="form-control form-control-alternative input-form"
                    placeholder="Agregar un Departamento" value="{{ old('departament', $farms->departament) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="municipaly">Municipio</label>
                <input type="text" id="municipaly" name="municipaly" class="form-control form-control-alternative input-form"
                    placeholder="Agregar un Municipio" value="{{ old('municipaly', $farms->municipaly) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="state">Estado</label>
                <input type="text" id="state" name="state" class="form-control form-control-alternative input-form"
                    placeholder="Agregar un Estado" value="{{ old('state', $farms->state) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="telephone">Telefono</label>
                <input type="number" id="telephone" name="telephone" class="form-control form-control-alternative input-form"
                    placeholder="Agregar un Telefono" value="{{ old('telephone', $farms->telephone) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="address">Direccion</label>
                <input type="text" id="address" name="address" class="form-control form-control-alternative input-form"
                    placeholder="Agregar una Direccion" value="{{ old('address', $farms->address) }}">
            </div>

    <div class="form-group button-farm asis">
        <button type="submit" class="btn btn-primary btn-secundary" style="width: 30%">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</div>