{{-- Este código será incluido en create.blade.php y edit.blade.php --}}

{{-- Campo: expense_type (Tipo de Gasto) --}}
<div class="mb-3">
    <label for="expense_type" class="form-label">Tipo de Gasto</label>
    <input type="text" 
           class="form-control @error('expense_type') is-invalid @enderror" 
           id="expense_type" 
           name="expense_type" 
           {{-- Usamos $expense->expense_type solo si $expense existe (es decir, en la vista edit) --}}
           value="{{ old('expense_type', $expense->expense_type ?? '') }}" 
           required>
    @error('expense_type')
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
              rows="3">{{ old('description', $expense->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>