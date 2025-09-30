:Formulario de Registro de Producción:_form.blade.php
{{-- ASUNCIÓN: La variable pasada al parcial es $production (singular) --}}

<div class="row">
    {{-- SELECTOR: area_id (Área donde se registra el resultado) --}}
    <div class="col-md-6 mb-3">
        <label for="area_id" class="form-label">Área/Parcela</label>
        <select class="form-select @error('area_id') is-invalid @enderror" 
                id="area_id" 
                name="area_id" 
                required>
            <option value="">Seleccione el Área</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}" 
                        {{ old('area_id', $production->area_id ?? '') == $area->id ? 'selected' : '' }}>
                    {{ $area->name }} (Finca: {{ $area->farm->name ?? 'N/A' }})
                </option>
            @endforeach
        </select>
        @error('area_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- SELECTOR: crop_type_id (Tipo de Cultivo Producido) --}}
    <div class="col-md-6 mb-3">
        <label for="crop_type_id" class="form-label">Tipo de Cultivo (Especie)</label>
        <select class="form-select @error('crop_type_id') is-invalid @enderror" 
                id="crop_type_id" 
                name="crop_type_id" 
                required>
            <option value="">Seleccione el Tipo</option>
            @foreach ($cropTypes as $cropType)
                <option value="{{ $cropType->id }}" 
                        {{ old('crop_type_id', $production->crop_type_id ?? '') == $cropType->id ? 'selected' : '' }}>
                    {{ $cropType->name }}
                </option>
            @endforeach
        </select>
        @error('crop_type_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<hr class="my-4">
<h4>Asociación de Procesos (Opcional)</h4>

<div class="row">
    {{-- SELECTOR: harvest_id (Cosecha Asociada) --}}
    <div class="col-md-4 mb-3">
        <label for="harvest_id" class="form-label">Cosecha Relacionada</label>
        <select class="form-select @error('harvest_id') is-invalid @enderror" 
                id="harvest_id" 
                name="harvest_id">
            <option value="">Sin Cosecha</option>
            @foreach ($harvests as $harvest)
                <option value="{{ $harvest->id }}" 
                        {{ old('harvest_id', $production->harvest_id ?? '') == $harvest->id ? 'selected' : '' }}>
                    ID #{{ $harvest->harvest_id }} ({{ $harvest->quantity ?? 0 }} {{ $harvest->unit ?? '' }})
                </option>
            @endforeach
        </select>
        @error('harvest_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- SELECTOR: preparation_id (Preparación Asociada) --}}
    <div class="col-md-4 mb-3">
        <label for="preparation_id" class="form-label">Preparación Relacionada</label>
        <select class="form-select @error('preparation_id') is-invalid @enderror" 
                id="preparation_id" 
                name="preparation_id">
            <option value="">Sin Preparación</option>
            @foreach ($preparations as $preparation)
                <option value="{{ $preparation->id }}" 
                        {{ old('preparation_id', $production->preparation_id ?? '') == $preparation->id ? 'selected' : '' }}>
                    ID #{{ $preparation->preparation_id }} ({{ $preparation->type_preparation }})
                </option>
            @endforeach
        </select>
        @error('preparation_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- SELECTOR: sowing_id (Siembra Asociada) --}}
    <div class="col-md-4 mb-3">
        <label for="sowing_id" class="form-label">Siembra Relacionada</label>
        <select class="form-select @error('sowing_id') is-invalid @enderror" 
                id="sowing_id" 
                name="sowing_id">
            <option value="">Sin Siembra</option>
            @foreach ($sowings as $sowing)
                <option value="{{ $sowing->id }}" 
                        {{ old('sowing_id', $production->sowing_id ?? '') == $sowing->id ? 'selected' : '' }}>
                    ID #{{ $sowing->sowing_id }} ({{ $sowing->seed_type }})
                </option>
            @endforeach
        </select>
        @error('sowing_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<hr class="my-4">

<div class="row">
    {{-- Campo: date_production (Fecha de registro de la producción) --}}
    <div class="col-md-6 mb-3">
        <label for="date_production" class="form-label">Fecha de Registro</label>
        <input type="date" 
               class="form-control @error('date_production') is-invalid @enderror" 
               id="date_production" 
               name="date_production" 
               value="{{ old('date_production', ($production->date_production ?? null) ? date('Y-m-d', strtotime($production->date_production)) : date('Y-m-d')) }}" 
               required>
        @error('date_production')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: quality (Calidad) --}}
    <div class="col-md-6 mb-3">
        <label for="quality" class="form-label">Calidad (Ej: A, B, Rechazo)</label>
        <input type="text" 
               class="form-control @error('quality') is-invalid @enderror" 
               id="quality" 
               name="quality" 
               value="{{ old('quality', $production->quality ?? '') }}" 
               required>
        @error('quality')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Campo: description (Descripción o notas adicionales) --}}
<div class="mb-3">
    <label for="description" class="form-label">Descripción / Notas Adicionales</label>
    <textarea class="form-control @error('description') is-invalid @enderror" 
              id="description" 
              name="description" 
              rows="3">{{ old('description', $production->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>