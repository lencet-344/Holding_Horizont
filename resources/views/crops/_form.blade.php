{{-- ASUNCIÓN: La variable pasada al parcial es $crop (singular) --}}

{{-- Campo: name (Nombre del Cultivo) --}}
<div class="mb-3">
    <label for="name" class="form-label">Nombre del Cultivo</label>
    <input type="text" 
           class="form-control @error('name') is-invalid @enderror" 
           id="name" 
           name="name" 
           value="{{ old('name', $crop->name ?? '') }}" 
           required>
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Campo: planting_date (Fecha de Siembra) --}}
<div class="mb-3">
    <label for="planting_date" class="form-label">Fecha de Siembra</label>
    <input type="date" 
           class="form-control @error('planting_date') is-invalid @enderror" 
           id="planting_date" 
           name="planting_date" 
           {{-- Convierte la fecha de Eloquent a formato HTML 'Y-m-d' --}}
           value="{{ old('planting_date', ($crop->planting_date ?? null) ? date('Y-m-d', strtotime($crop->planting_date)) : '') }}" 
           required>
    @error('planting_date')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Campo: expected_yield (Rendimiento Esperado) --}}
<div class="mb-3">
    <label for="expected_yield" class="form-label">Rendimiento Esperado (Ej: Toneladas/Hectárea)</label>
    <input type="number" 
           step="0.01" {{-- Permite decimales --}}
           class="form-control @error('expected_yield') is-invalid @enderror" 
           id="expected_yield" 
           name="expected_yield" 
           value="{{ old('expected_yield', $crop->expected_yield ?? '') }}">
    @error('expected_yield')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- SELECTOR: crop_type_id (Tipo de Cultivo) --}}
{{-- ASUNCIÓN: El controlador pasa una variable $cropTypes --}}
<div class="mb-3">
    <label for="crop_type_id" class="form-label">Tipo de Cultivo</label>
    <select class="form-select @error('crop_type_id') is-invalid @enderror" 
            id="crop_type_id" 
            name="crop_type_id" 
            required>
        <option value="">Seleccione el Tipo de Cultivo</option>
        @foreach ($cropTypes as $type)
            <option value="{{ $type->crop_type_id }}" 
                    {{ old('crop_type_id', $crop->crop_type_id ?? '') == $type->crop_type_id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
        @endforeach
    </select>
    @error('crop_type_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- SELECTOR: area_id (Área / Lote) --}}
{{-- ASUNCIÓN: El controlador pasa una variable $areas --}}
<div class="mb-3">
    <label for="area_id" class="form-label">Área / Lote de Siembra</label>
    <select class="form-select @error('area_id') is-invalid @enderror" 
            id="area_id" 
            name="area_id" 
            required>
        <option value="">Seleccione el Área/Lote</option>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}" 
                    {{ old('area_id', $crop->area_id ?? '') == $area->id ? 'selected' : '' }}>
                {{ $area->name }} (Finca: {{ $area->farm->name ?? 'N/A' }})
            </option>
        @endforeach
    </select>
    @error('area_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>