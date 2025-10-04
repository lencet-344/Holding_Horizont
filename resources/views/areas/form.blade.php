{{-- Campo: name (Nombre del Área) --}}
<div class="mb-3">
    <label for="name" class="form-label">Nombre del Área</label>
    <input type="text" 
           class="form-control @error('name') is-invalid @enderror" 
           id="name" 
           name="name" 
           value="{{ old('name', $area->name ?? '') }}" 
           required>
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Campo: farm_id (Relación con la Finca/Farm) --}}
{{-- ASUNCIÓN: El controlador pasa una variable $farms con todas las fincas --}}
<div class="mb-3">
    <label for="farm_id" class="form-label">Finca a la que Pertenece</label>
    <select class="form-select @error('farm_id') is-invalid @enderror" 
            id="farm_id" 
            name="farm_id" 
            required>
        <option value="">Seleccione una Finca</option>
        @foreach ($farms as $farm)
            <option value="{{ $farm->id }}" 
                    {{ old('farm_id', $area->farm_id ?? '') == $farm->id ? 'selected' : '' }}>
                {{ $farm->name }}
            </option>
        @endforeach
    </select>
    @error('farm_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>