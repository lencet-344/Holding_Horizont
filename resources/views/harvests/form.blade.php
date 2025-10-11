{{-- ASUNCIÓN: La variable pasada al parcial es $harvest (singular) --}}

<div class="row">
    {{-- SELECTOR: crop_id (Cultivo cosechado) --}}
    {{-- ASUNCIÓN: El controlador pasa una variable $crops --}}
    <div class="col-md-8 mb-3">
        <label for="crop_id" class="form-label">Cultivo Cosechado</label>
        <select class="form-select @error('crop_id') is-invalid @enderror" 
                id="crop_id" 
                name="crop_id" 
                required>
            <option value="">Seleccione el Cultivo</option>
            @foreach ($crops as $crop)
                <option value="{{ $crop->id }}" 
                        {{ old('crop_id', $harvest->crop_id ?? '') == $crop->id ? 'selected' : '' }}>
                    {{ $crop->name }} (Área: {{ $crop->area_name->name ?? 'N/A' }})
                </option>
            @endforeach
        </select>
        @error('crop_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: harvest_date (Fecha de Cosecha) --}}
    <div class="col-md-4 mb-3">
        <label for="harvest_date" class="form-label">Fecha de Cosecha</label>
        <input type="date" 
               class="form-control @error('harvest_date') is-invalid @enderror" 
               id="harvest_date" 
               name="harvest_date" 
               value="{{ old('harvest_date', ($harvest->harvest_date ?? null) ? date('Y-m-d', strtotime($harvest->harvest_date)) : '') }}" 
               required>
        @error('harvest_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    {{-- Campo: quantity --}}
    <div class="col-md-4 mb-3">
        <label for="quantity" class="form-label">Cantidad Cosechada</label>
        <input type="number" 
               step="0.01"
               class="form-control @error('quantity') is-invalid @enderror" 
               id="quantity" 
               name="quantity" 
               value="{{ old('quantity', $harvest->quantity ?? '') }}" 
               required>
        @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: unit (Ej: Kilogramos, Toneladas, Sacos) --}}
    <div class="col-md-4 mb-3">
        <label for="unit" class="form-label">Unidad de Medida</label>
        <input type="text" 
               class="form-control @error('unit') is-invalid @enderror" 
               id="unit" 
               name="unit" 
               value="{{ old('unit', $harvest->unit ?? '') }}" 
               required>
        @error('unit')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    {{-- Campo: cost (Costo asociado a la cosecha) --}}
    <div class="col-md-4 mb-3">
        <label for="cost" class="form-label">Costo Total de Cosecha ($)</label>
        <input type="number" 
               step="0.01"
               class="form-control @error('cost') is-invalid @enderror" 
               id="cost" 
               name="cost" 
               value="{{ old('cost', $harvest->cost ?? '') }}">
        @error('cost')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Campo: storage_location (Ubicación de Almacenamiento) --}}
<div class="mb-3">
    <label for="storage_location" class="form-label">Ubicación de Almacenamiento</label>
    <input type="text" 
           class="form-control @error('storage_location') is-invalid @enderror" 
           id="storage_location" 
           name="storage_location" 
           value="{{ old('storage_location', $harvest->storage_location ?? '') }}">
    @error('storage_location')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>