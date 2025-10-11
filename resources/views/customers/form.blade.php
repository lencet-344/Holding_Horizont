<h6 class="heading-small text-muted mb-4">Datos del Cliente</h6>
<div class="pl-lg-4 card-body-form">
    <div class="row container-table">
        {{-- <div class="col-lg-6"> --}}
            <div class="form-group">
                <label class="form-control-label" for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control form-control-alternative input-form"
                    placeholder="Agregar nombre" value="{{ old('name', $customer->name) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="last_name">Apellido</label>
                <input type="text" id="last_name" name="last_name" class="form-control form-control-alternative input-form"
                    placeholder="Agregar Apellido" value="{{ old('last_name', $customers->last_name) }}">
            </div>


            <div class="form-group">
                <label class="form-control-label" for="age">Edad</label>
                <input type="number" id="age" name="age" class="form-control form-control-alternative input-form"
                    placeholder="Agregar una Edad" value="{{ old('age', $customer->age) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="gender">Genero</label>
                <input type="text" id="gender" name="gender" class="form-control form-control-alternative input-form"
                    placeholder="Agregar Genero" value="{{ old('gender', $customer->gender) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="email">Correo Electronico</label>
                <input type="text" id="email" name="email" class="form-control form-control-alternative input-form"
                    placeholder="Agregar un Correo Electronico" value="{{ old('email', $customer->email) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="telephone">Telefono</label>
                <input type="number" id="telephone" name="telephone" class="form-control form-control-alternative input-form"
                    placeholder="Agregar un Telefono" value="{{ old('telephone', $customer->telephone) }}">
            </div>

    <div class="form-group button-custumer asis">
        <button type="submit" class="btn btn-primary btn-secundary" style="width: 30%">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</div>
