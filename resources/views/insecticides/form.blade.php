{{-- ASUNCIÓN: La variable pasada al parcial es $insecticide (singular) --}}

{{-- Campo: name --}}
<div class="mb-3">
    <label for="name" class="form-label">Nombre Comercial del Insecticida</label>
    <input type="text" 
           class="form-control @error('name') is-invalid @enderror" 
           id="name" 
           name="name" 
           value="{{ old('name', $insecticide->name ?? '') }}" 
           required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    {{-- Campo: type_insecticide --}}
    <div class="col-md-6 mb-3">
        <label for="type_insecticide" class="form-label">Tipo de Insecticida (Ej: Sistémico, de Contacto)</label>
        <input type="text" 
               class="form-control @error('type_insecticide') is-invalid @enderror" 
               id="type_insecticide" 
               name="type_insecticide" 
               value="{{ old('type_insecticide', $insecticide->type_insecticide ?? '') }}">
        @error('type_insecticide')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: active_ingredient --}}
    <div class="col-md-6 mb-3">
        <label for="active_ingredient" class="form-label">Ingrediente Activo</label>
        <input type="text" 
               class="form-control @error('active_ingredient') is-invalid @enderror" 
               id="active_ingredient" 
               name="active_ingredient" 
               value="{{ old('active_ingredient', $insecticide->active_ingredient ?? '') }}" 
               required>
        @error('active_ingredient')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<hr class="my-4">
<h4>Información de Dosis y Uso</h4>

<div class="row">
    {{-- Campo: recomended_dose --}}
    <div class="col-md-4 mb-3">
        <label for="recomended_dose" class="form-label">Dosis Recomendada</label>
        <input type="number" 
               step="0.01"
               class="form-control @error('recomended_dose') is-invalid @enderror" 
               id="recomended_dose" 
               name="recomended_dose" 
               value="{{ old('recomended_dose', $insecticide->recomended_dose ?? '') }}">
        @error('recomended_dose')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: measure (Unidad de Medida de la Dosis) --}}
    <div class="col-md-4 mb-3">
        <label for="measure" class="form-label">Unidad (Ej: ml/Lt, gr/Ha)</label>
        <input type="text" 
               class="form-control @error('measure') is-invalid @enderror" 
               id="measure" 
               name="measure" 
               value="{{ old('measure', $insecticide->measure ?? '') }}">
        @error('measure')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    {{-- SELECTOR: crop_id (Cultivo Principal Recomendado) --}}
    {{-- ASUNCIÓN: El controlador pasa una variable $crops --}}
    <div class="col-md-4 mb-3">
        <label for="crop_id" class="form-label">Cultivo Principal Recomendado</label>
        <select class="form-select @error('crop_id') is-invalid @enderror" 
                id="crop_id" 
                name="crop_id">
            <option value="">Seleccione un Cultivo (Opcional)</option>
            @foreach ($crops as $crop)
                <option value="{{ $crop->id }}" 
                        {{ old('crop_id', $insecticide->crop_id ?? '') == $crop->id ? 'selected' : '' }}>
                    {{ $crop->name }}
                </option>
            @endforeach
        </select>
        @error('crop_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Campo: technical_sheel (Enlace o Referencia a Ficha Técnica) --}}
<div class="mb-3">
    <label for="technical_sheel" class="form-label">Ficha Técnica / Enlace (URL)</label>
    <input type="url" 
           class="form-control @error('technical_sheel') is-invalid @enderror" 
           id="technical_sheel" 
           name="technical_sheel" 
           value="{{ old('technical_sheel', $insecticide->technical_sheel ?? '') }}">
    @error('technical_sheel')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>