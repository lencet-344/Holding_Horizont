<?php

namespace App\Http\Controllers;

use App\Models\Production; // Modelo principal
use App\Models\Crop; // Para vincular la producción a un cultivo
use App\Http\Requests\ProductionRequest; // Nuevo Request

class ProductionController extends Controller
{
    // ... index() y create() se mantienen igual ...

    /**
     * Guarda un nuevo lote de producción en la base de datos (función C - Create/Crear).
     */
    public function store(ProductionRequest $request) // Cambio aquí
    {
        // La validación se hace automáticamente por ProductionRequest

        // 2. Creación del registro
        Production::create($request->validated()); // Cambio aquí: validated()

        // 3. Redireccionar con éxito
        return redirect()->route('productions.index')
                         ->with('success', '¡Lote de producción registrado con éxito!');
    }

    // ... show() y edit() se mantienen igual ...

    /**
     * Actualiza un lote de producción en la base de datos (función U - Update/Actualizar).
     */
    public function update(ProductionRequest $request, Production $production) // Cambio aquí
    {
        // La validación se hace automáticamente por ProductionRequest

        // 2. Actualización del registro
        $production->update($request->validated()); // Cambio aquí: validated()

        // 3. Redireccionar con éxito
        return redirect()->route('productions.index')
                         ->with('success', 'La producción ha sido actualizada correctamente.');
    }

    // ... destroy() se mantiene igual ...
}

