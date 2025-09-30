{{-- ASUNCIÓN: La variable pasada al parcial es $farm (singular) --}}

{{-- Campo: name --}}
<div class="mb-3">
    <label for="name" class="form-label">Nombre de la Finca</label>
    <input type="text" 
           class="form-control @error('name') is-invalid @enderror" 
           id="name" 
           name="name" 
           value="{{ old('name', $farm->name ?? '') }}" 
           required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    {{-- Campo: extension --}}
    <div class="col-md-6 mb-3">
        <label for="extension" class="form-label">Extensión (Ej: Hectáreas)</label>
        <input type="number" 
               step="0.01"
               class="form-control @error('extension') is-invalid @enderror" 
               id="extension" 
               name="extension" 
               value="{{ old('extension', $farm->extension ?? '') }}">
        @error('extension')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- SELECTOR: property_type_id (Tipo de Propiedad) --}}
    {{-- ASUNCIÓN: El controlador pasa una variable $propertyTypes --}}
    <div class="col-md-6 mb-3">
        <label for="property_type_id" class="form-label">Tipo de Propiedad</label>
        <select class="form-select @error('property_type_id') is-invalid @enderror" 
                id="property_type_id" 
                name="property_type_id" 
                required>
            <option value="">Seleccione el Tipo de Propiedad</option>
            @foreach ($propertyTypes as $type)
                <option value="{{ $type->id }}" 
                        {{ old('property_type_id', $farm->property_types->id ?? '') == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
        @error('property_type_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<hr class="my-4">
<h4>Ubicación Detallada</h4>

<div class="row">
    {{-- Campo: departament --}}
    <div class="col-md-4 mb-3">
        <label for="departament" class="form-label">Departamento</label>
        <input type="text" 
               class="form-control @error('departament') is-invalid @enderror" 
               id="departament" 
               name="departament" 
               value="{{ old('departament', $farm->departament ?? '') }}">
        @error('departament')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    {{-- Campo: municipaly --}}
    <div class="col-md-4 mb-3">
        <label for="municipaly" class="form-label">Municipio</label>
        <input type="text" 
               class="form-control @error('municipaly') is-invalid @enderror" 
               id="municipaly" 
               name="municipaly" 
               value="{{ old('municipaly', $farm->municipaly ?? '') }}">
        @error('municipaly')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: state --}}
    <div class="col-md-4 mb-3">
        <label for="state" class="form-label">Estado / Provincia</label>
        <input type="text" 
               class="form-control @error('state') is-invalid @enderror" 
               id="state" 
               name="state" 
               value="{{ old('state', $farm->state ?? '') }}">
        @error('state')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Campo: location (Descripción o Referencia de la ubicación) --}}
<div class="mb-3">
    <label for="location" class="form-label">Referencia de Ubicación (Coordenadas, etc.)</label>
    <input type="text" 
           class="form-control @error('location') is-invalid @enderror" 
           id="location" 
           name="location" 
           value="{{ old('location', $farm->location ?? '') }}">
    @error('location')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Campo: address (Dirección Postal/General) --}}
<div class="mb-3">
    <label for="address" class="form-label">Dirección (Calle, No.)</label>
    <input type="text" 
           class="form-control @error('address') is-invalid @enderror" 
           id="address" 
           name="address" 
           value="{{ old('address', $farm->address ?? '') }}">
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Campo: telephone --}}
<div class="mb-3">
    <label for="telephone" class="form-label">Teléfono de Contacto</label>
    <input type="text" 
           class="form-control @error('telephone') is-invalid @enderror" 
           id="telephone" 
           name="telephone" 
           value="{{ old('telephone', $farm->telephone ?? '') }}">
    @error('telephone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>