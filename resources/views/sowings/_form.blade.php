{{-- ASUNCIÓN: La variable pasada al parcial es $sowing (singular) --}}

<div class="row">
    {{-- SELECTOR: crop_id (Cultivo al que pertenece la siembra) --}}
    {{-- ASUNCIÓN: El controlador pasa una variable $crops --}}
    <div class="col-md-6 mb-3">
        <label for="crop_id" class="form-label">Cultivo Asociado</label>
        <select class="form-select @error('crop_id') is-invalid @enderror" 
                id="crop_id" 
                name="crop_id" 
                required>
            <option value="">Seleccione el Cultivo</option>
            @foreach ($crops as $crop)
                <option value="{{ $crop->id }}" 
                        {{ old('crop_id', $sowing->crop_id ?? '') == $crop->id ? 'selected' : '' }}>
                    {{ $crop->name }} (Área: {{ $crop->area_name->name ?? 'N/A' }})
                </option>
            @endforeach
        </select>
        @error('crop_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: sowing_date (Fecha de Siembra) --}}
    <div class="col-md-6 mb-3">
        <label for="sowing_date" class="form-label">Fecha de Siembra</label>
        <input type="date" 
               class="form-control @error('sowing_date') is-invalid @enderror" 
               id="sowing_date" 
               name="sowing_date" 
               value="{{ old('sowing_date', ($sowing->sowing_date ?? null) ? date('Y-m-d', strtotime($sowing->sowing_date)) : '') }}" 
               required>
        @error('sowing_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    {{-- Campo: crap_type (Tipo de Semilla/Cultivo) --}}
    <div class="col-md-4 mb-3">
        <label for="crap_type" class="form-label">Tipo/Variedad de Semilla</label>
        <input type="text" 
               class="form-control @error('crap_type') is-invalid @enderror" 
               id="crap_type" 
               name="crap_type" 
               value="{{ old('crap_type', $sowing->crap_type ?? '') }}" 
               required>
        @error('crap_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: seed_amount (Cantidad de Semilla Usada) --}}
    <div class="col-md-4 mb-3">
        <label for="seed_amount" class="form-label">Cantidad de Semilla (Kg/L)</label>
        <input type="number" 
               step="0.01"
               class="form-control @error('seed_amount') is-invalid @enderror" 
               id="seed_amount" 
               name="seed_amount" 
               value="{{ old('seed_amount', $sowing->seed_amount ?? '') }}" 
               required>
        @error('seed_amount')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: area_sown (Área sembrada) --}}
    <div class="col-md-4 mb-3">
        <label for="area_sown" class="form-label">Área Sembrada (M² o Hectáreas)</label>
        <input type="number" 
               step="0.01"
               class="form-control @error('area_sown') is-invalid @enderror" 
               id="area_sown" 
               name="area_sown" 
               value="{{ old('area_sown', $sowing->area_sown ?? '') }}">
        @error('area_sown')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Campo: status (Estado de la siembra) --}}
<div class="mb-3">
    <label for="status" class="form-label">Estado de la Siembra (Ej: Germinando, Fallida, Crecimiento)</label>
    <input type="text" 
           class="form-control @error('status') is-invalid @enderror" 
           id="status" 
           name="status" 
           value="{{ old('status', $sowing->status ?? '') }}" 
           required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>