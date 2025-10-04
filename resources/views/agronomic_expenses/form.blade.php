<h6 class="heading-small text-muted mb-4">Datos de Gastos Agronomicos</h6>
<div class="pl-lg-4 card-body-form">
    <div class="row container-table">
        {{-- <div class="col-lg-6"> --}}
            <div class="form-group">
                <label class="form-control-label" for="names">Tipos de Gastos</label>
                <input type="text" id="expense_type" name="expense_type" class="form-control form-control-alternative input-form"
                    placeholder="Agregar un Tipo de gasto" value="{{ old('expense_type', $agronomic_expenses->expense_type) }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="description">Descripcion</label>
                <input type="text" id="description" name="description" class="form-control form-control-alternative input-form"
                    placeholder="Agregar una Edad" value="{{ old('description', $agronomic_expenses->description) }}">
            </div>

    <div class="form-group button-agronomic_expense asis">
        <button type="submit" class="btn btn-primary btn-secundary" style="width: 30%">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</div>
