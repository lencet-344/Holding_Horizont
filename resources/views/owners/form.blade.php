{{-- ASUNCIÓN: La variable pasada al parcial es $owner (singular) --}}

<div class="row">
    {{-- Campo: name --}}
    <div class="col-md-6 mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" 
               class="form-control @error('name') is-invalid @enderror" 
               id="name" 
               name="name" 
               value="{{ old('name', $owner->name ?? '') }}" 
               required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: last_name --}}
    <div class="col-md-6 mb-3">
        <label for="last_name" class="form-label">Apellido</label>
        <input type="text" 
               class="form-control @error('last_name') is-invalid @enderror" 
               id="last_name" 
               name="last_name" 
               value="{{ old('last_name', $owner->last_name ?? '') }}" 
               required>
        @error('last_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    {{-- Campo: identification_card --}}
    <div class="col-md-6 mb-3">
        <label for="identification_card" class="form-label">Cédula / Identificación</label>
        <input type="text" 
               class="form-control @error('identification_card') is-invalid @enderror" 
               id="identification_card" 
               name="identification_card" 
               value="{{ old('identification_card', $owner->identification_card ?? '') }}">
        @error('identification_card')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    {{-- Campo: telephone --}}
    <div class="col-md-6 mb-3">
        <label for="telephone" class="form-label">Teléfono</label>
        <input type="text" 
               class="form-control @error('telephone') is-invalid @enderror" 
               id="telephone" 
               name="telephone" 
               value="{{ old('telephone', $owner->telephone ?? '') }}">
        @error('telephone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Campo: email --}}
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" 
           class="form-control @error('email') is-invalid @enderror" 
           id="email" 
           name="email" 
           value="{{ old('email', $owner->email ?? '') }}" 
           required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Campo: address --}}
<div class="mb-3">
    <label for="address" class="form-label">Dirección</label>
    <textarea class="form-control @error('address') is-invalid @enderror" 
              id="address" 
              name="address" 
              rows="2">{{ old('address', $owner->address ?? '') }}</textarea>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>