{{-- ASUNCIÓN: La variable pasada al parcial es $user (singular) --}}

<div class="row">
    {{-- Campo: name --}}
    <div class="col-md-6 mb-3">
        <label for="name" class="form-label">Nombre Completo</label>
        <input type="text" 
               class="form-control @error('name') is-invalid @enderror" 
               id="name" 
               name="name" 
               value="{{ old('name', $user->name ?? '') }}" 
               required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: email --}}
    <div class="col-md-6 mb-3">
        <label for="email" class="form-label">Correo Electrónico (Email)</label>
        <input type="email" 
               class="form-control @error('email') is-invalid @enderror" 
               id="email" 
               name="email" 
               value="{{ old('email', $user->email ?? '') }}" 
               required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<hr>
<h4>Cambio de Contraseña (Dejar en blanco para no cambiar)</h4>

<div class="row">
    {{-- Campo: password --}}
    <div class="col-md-6 mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" 
               class="form-control @error('password') is-invalid @enderror" 
               id="password" 
               name="password"
               {{ isset($user) ? '' : 'required' }}> {{-- Requerido solo en Creación --}}
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if (isset($user))
            <small class="form-text text-muted">Deja en blanco si no deseas cambiar la contraseña.</small>
        @endif
    </div>

    {{-- Campo: password_confirmation --}}
    <div class="col-md-6 mb-3">
        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
        <input type="password" 
               class="form-control" 
               id="password_confirmation" 
               name="password_confirmation"
               {{ isset($user) ? '' : 'required' }}>
    </div>
</div>

<hr>
<h4>Imagen de Perfil</h4>

<div class="mb-3">
    @if (isset($user) && $user->profile_image)
        <div class="mb-2">
            <img src="{{ $user->image() }}" alt="Imagen actual" style="max-width: 150px; border-radius: 50%;">
            <p class="small text-muted mt-1">Imagen actual</p>
        </div>
    @endif

    {{-- Campo: profile_image (Subida de archivo) --}}
    <label for="profile_image" class="form-label">Subir nueva Imagen de Perfil</label>
    <input type="file" 
           class="form-control @error('profile_image') is-invalid @enderror" 
           id="profile_image" 
           name="profile_image" 
           accept="image/*">
    @error('profile_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>