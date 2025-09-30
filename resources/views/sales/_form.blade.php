{{-- ASUNCIÓN: La variable pasada al parcial es $sale (singular) --}}

<div class="row">
    {{-- SELECTOR: harvest_id (Cosecha de donde proviene el producto) --}}
    <div class="col-md-6 mb-3">
        <label for="harvest_id" class="form-label">Cosecha de Origen</label>
        <select class="form-select @error('harvest_id') is-invalid @enderror" 
                id="harvest_id" 
                name="harvest_id" 
                required>
            <option value="">Seleccione la Cosecha</option>
            @foreach ($harvests as $harvest)
                <option value="{{ $harvest->id }}" 
                        {{ old('harvest_id', $sale->harvest_id ?? '') == $harvest->id ? 'selected' : '' }}>
                    ID #{{ $harvest->harvest_id }} - ({{ $harvest->product_name }} - {{ $harvest->quantity ?? 0 }} {{ $harvest->unit ?? 'unidades' }})
                </option>
            @endforeach
        </select>
        @error('harvest_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- SELECTOR: customer_id (Cliente al que se vendió) --}}
    <div class="col-md-6 mb-3">
        <label for="customer_id" class="form-label">Cliente</label>
        <select class="form-select @error('customer_id') is-invalid @enderror" 
                id="customer_id" 
                name="customer_id" 
                required>
            <option value="">Seleccione el Cliente</option>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" 
                        {{ old('customer_id', $sale->customer_id ?? '') == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }} ({{ $customer->phone ?? 'N/A' }})
                </option>
            @endforeach
        </select>
        @error('customer_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    {{-- Campo: date (Fecha de la Venta) --}}
    <div class="col-md-4 mb-3">
        <label for="date" class="form-label">Fecha de Venta</label>
        <input type="date" 
               class="form-control @error('date') is-invalid @enderror" 
               id="date" 
               name="date" 
               value="{{ old('date', ($sale->date ?? null) ? date('Y-m-d', strtotime($sale->date)) : date('Y-m-d')) }}" 
               required>
        @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    {{-- Campo: quantity (Cantidad vendida) --}}
    <div class="col-md-4 mb-3">
        <label for="quantity" class="form-label">Cantidad Vendida</label>
        <input type="number" 
               step="0.01"
               class="form-control @error('quantity') is-invalid @enderror" 
               id="quantity" 
               name="quantity" 
               value="{{ old('quantity', $sale->quantity ?? '') }}" 
               required>
        @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Campo: mount (Monto total de la venta) --}}
    <div class="col-md-4 mb-3">
        <label for="mount" class="form-label">Monto Total ($)</label>
        <input type="number" 
               step="0.01"
               class="form-control @error('mount') is-invalid @enderror" 
               id="mount" 
               name="mount" 
               value="{{ old('mount', $sale->mount ?? '') }}" 
               required>
        @error('mount')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Campo: description (Descripción o notas adicionales sobre la venta) --}}
<div class="mb-3">
    <label for="description" class="form-label">Descripción / Notas de Venta</label>
    <textarea class="form-control @error('description') is-invalid @enderror" 
              id="description" 
              name="description" 
              rows="3">{{ old('description', $sale->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>