{{-- ASUNCIÓN: La variable pasada al parcial es $employee (singular) --}}

<div class="row">
    {{-- Campo: name --}}
    <div class="col-md-6 mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" 
               class="form-control @error('name') is-invalid @enderror" 
               id="name" 
               name="name" 
               value="{{ old('name', $employee->name ?? '') }}" 
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
               value="{{ old('last_name', $employee->last_name ?? '') }}" 
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
               value="{{ old('identification_card', $employee->identification_card ?? '') }}">
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
               value="{{ old('telephone', $employee->telephone ?? '') }}">
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
           value="{{ old('email', $employee->email ?? '') }}" 
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
              rows="2">{{ old('address', $employee->address ?? '') }}</textarea>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    {{-- Campo: hire_date (Fecha de Contratación) --}}
    <div class="col-md-6 mb-3">
        <label for="hire_date" class="form-label">Fecha de Contratación</label>
        <input type="date" 
               class="form-control @error('hire_date') is-invalid @enderror" 
               id="hire_date" 
               name="hire_date" 
               {{-- Formatea la fecha para el campo HTML --}}
               value="{{ old('hire_date', ($employee->hire_date ?? null) ? date('Y-m-d', strtotime($employee->hire_date)) : '') }}" 
               required>
        @error('hire_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- SELECTOR: area_id (Área de Asignación) --}}
    {{-- ASUNCIÓN: El controlador pasa una variable $areas --}}
    <div class="col-md-6 mb-3">
        <label for="area_id" class="form-label">Área Asignada</label>
        <select class="form-select @error('area_id') is-invalid @enderror" 
                id="area_id" 
                name="area_id">
            <option value="">Seleccione un Área (Opcional)</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}" 
                        {{ old('area_id', $employee->area_id ?? '') == $area->id ? 'selected' : '' }}>
                    {{ $area->name }} (Finca: {{ $area->farm->name ?? 'N/A' }})
                </option>
            @endforeach
        </select>
        @error('area_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>