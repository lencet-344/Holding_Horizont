{{-- ASUNCIÓN: La variable pasada al parcial es $customer (singular) --}}

{{-- Campo: name --}}
<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" 
           class="form-control @error('name') is-invalid @enderror" 
           id="name" 
           name="name" 
           value="{{ old('name', $customer->name ?? '') }}" 
           required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Campo: last_name --}}
<div class="mb-3">
    <label for="last_name" class="form-label">Apellido</label>
    <input type="text" 
           class="form-control @error('last_name') is-invalid @enderror" 
           id="last_name" 
           name="last_name" 
           value="{{ old('last_name', $customer->last_name ?? '') }}" 
           required>
    @error('last_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Campo: age --}}
<div class="mb-3">
    <label for="age" class="form-label">Edad</label>
    <input type="number" 
           class="form-control @error('age') is-invalid @enderror" 
           id="age" 
           name="age" 
           value="{{ old('age', $customer->age ?? '') }}">
    @error('age')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Campo: gender (Selector) --}}
@php
    $currentGender = old('gender', $customer->gender ?? '');
@endphp
<div class="mb-3">
    <label for="gender" class="form-label">Género</label>
    <select class="form-select @error('gender') is-invalid @enderror" 
            id="gender" 
            name="gender">
        <option value="">Seleccione el género</option>
        <option value="Masculino" {{ $currentGender == 'Masculino' ? 'selected' : '' }}>Masculino</option>
        <option value="Femenino" {{ $currentGender == 'Femenino' ? 'selected' : '' }}>Femenino</option>
        <option value="Otro" {{ $currentGender == 'Otro' ? 'selected' : '' }}>Otro</option>
    </select>
    @error('gender')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Campo: email --}}
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" 
           class="form-control @error('email') is-invalid @enderror" 
           id="email" 
           name="email" 
           value="{{ old('email', $customer->email ?? '') }}" 
           required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Campo: telephone --}}
<div class="mb-3">
    <label for="telephone" class="form-label">Teléfono</label>
    <input type="text" 
           class="form-control @error('telephone') is-invalid @enderror" 
           id="telephone" 
           name="telephone" 
           value="{{ old('telephone', $customer->telephone ?? '') }}">
    @error('telephone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>