{{-- ASUNCIÓN: La variable pasada al parcial es $preparation (singular) --}}

<div class="row">
    {{-- SELECTOR: crop_id (Cultivo al que se destina la preparación) --}}
    {{-- ASUNCIÓN: El controlador pasa una variable $crops --}}
    <div class="col-md-7 mb-3">
        <label for="crop_id" class="form-label">Cultivo al que se Asocia</label>
        <select class="form-select @error('crop_id') is-invalid @enderror" 
                id="crop_id" 
                name="crop_id" 
                required>
            <option value="">Seleccione el Cultivo</option>
            @foreach ($crops as $crop)
                <option value="{{ $crop->id }}" 
                        {{ old('crop_id', $preparation->crop_id ?? '') == $crop->id ? 'selected' : '' }}>
                    {{ $crop->name }} (Área: {{ $crop->area_name->name ?? 'N/A' }})
                </option>
            @endforeach
        </select>
        @error('crop_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: type_preparation (Tipo de Preparación: Arado, Rastra, Nivelación, etc.) --}}
    <div class="col-md-5 mb-3">
        <label for="type_preparation" class="form-label">Tipo de Preparación</label>
        <input type="text" 
               class="form-control @error('type_preparation') is-invalid @enderror" 
               id="type_preparation" 
               name="type_preparation" 
               value="{{ old('type_preparation', $preparation->type_preparation ?? '') }}" 
               required>
        @error('type_preparation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    {{-- Campo: star_date (Fecha de Inicio) --}}
    <div class="col-md-6 mb-3">
        <label for="star_date" class="form-label">Fecha de Inicio</label>
        <input type="date" 
               class="form-control @error('star_date') is-invalid @enderror" 
               id="star_date" 
               name="star_date" 
               value="{{ old('star_date', ($preparation->star_date ?? null) ? date('Y-m-d', strtotime($preparation->star_date)) : '') }}" 
               required>
        @error('star_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: end_date (Fecha de Fin) --}}
    <div class="col-md-6 mb-3">
        <label for="end_date" class="form-label">Fecha de Finalización</label>
        <input type="date" 
               class="form-control @error('end_date') is-invalid @enderror" 
               id="end_date" 
               name="end_date" 
               value="{{ old('end_date', ($preparation->end_date ?? null) ? date('Y-m-d', strtotime($preparation->end_date)) : '') }}">
        @error('end_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    {{-- Campo: equipment_used (Equipo utilizado) --}}
    <div class="col-md-6 mb-3">
        <label for="equipment_used" class="form-label">Equipo Utilizado (Ej: Tractor, Arado)</label>
        <input type="text" 
               class="form-control @error('equipment_used') is-invalid @enderror" 
               id="equipment_used" 
               name="equipment_used" 
               value="{{ old('equipment_used', $preparation->equipment_used ?? '') }}">
        @error('equipment_used')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: labor_hours (Horas de mano de obra) --}}
    <div class="col-md-6 mb-3">
        <label for="labor_hours" class="form-label">Horas de Mano de Obra</label>
        <input type="number" 
               step="0.5"
               class="form-control @error('labor_hours') is-invalid @enderror" 
               id="labor_hours" 
               name="labor_hours" 
               value="{{ old('labor_hours', $preparation->labor_hours ?? '') }}">
        @error('labor_hours')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Campo: cost (Costo total de la actividad) --}}
<div class="mb-3">
    <label for="cost" class="form-label">Costo Total de la Preparación ($)</label>
    <input type="number" 
           step="0.01"
           class="form-control @error('cost') is-invalid @enderror" 
           id="cost" 
           name="cost" 
           value="{{ old('cost', $preparation->cost ?? '') }}">
    @error('cost')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>