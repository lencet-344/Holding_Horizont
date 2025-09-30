:Formulario Tipo de Propiedad:_form.blade.php
{{-- ASUNCIÓN: La variable pasada al parcial es $propertyType (singular) --}}

{{-- Campo: name (Nombre del Tipo de Propiedad) --}}
<div class="mb-3">
    <label for="name" class="form-label">Nombre del Tipo de Propiedad</label>
    <input type="text" 
           class="form-control @error('name') is-invalid @enderror" 
           id="name" 
           name="name" 
           value="{{ old('name', $propertyType->name ?? '') }}" 
           required>
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Campo: description (Descripción) --}}
<div class="mb-3">
    <label for="description" class="form-label">Descripción</label>
    <textarea class="form-control @error('description') is-invalid @enderror" 
              id="description" 
              name="description" 
              rows="3">{{ old('description', $propertyType->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>