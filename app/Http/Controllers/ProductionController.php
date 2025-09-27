<?php

namespace App\Http\Controllers;

use App\Models\Production; // Modelo principal
use App\Models\Crop; // Para vincular la producción a un cultivo
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    /**
     * Muestra una lista de todos los lotes de producción (función R - Read/Leer).
     */
    public function index()
    {
        // Trae todas las producciones, cargando el cultivo relacionado
        $productions = Production::with('crop')->latest()->get(); 

        // Retorna la vista 'productions.index'
        return view('productions.index', compact('productions'));
    }

    /**
     * Muestra el formulario para crear un nuevo lote de producción (función C - Create/Crear).
     */
    public function create()
    {
        // Traemos todos los cultivos para seleccionar a cuál pertenece la producción
        $crops = Crop::all();

        // Retorna la vista 'productions.create'
        return view('productions.create', compact('crops'));
    }

    /**
     * Guarda un nuevo lote de producción en la base de datos (función C - Create/Crear).
     */
    public function store(Request $request)
    {
        // 1. Validación de datos
        $request->validate([
            'crop_id' => 'required|exists:crops,id',
            'production_date' => 'required|date',
            'total_quantity' => 'required|numeric|min:1',
            'unit_of_measure' => 'required|string|max:50',
            'total_cost' => 'nullable|numeric|min:0', // Costo puede ser nulo inicialmente
            'total_revenue' => 'nullable|numeric|min:0', // Ingreso puede ser nulo
        ]);

        // 2. Creación del registro
        Production::create($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('productions.index')
                         ->with('success', '¡Lote de producción registrado con éxito!');
    }

    /**
     * Muestra los detalles de un lote de producción específico (función R - Read/Leer).
     */
    public function show(Production $production)
    {
        // Retorna la vista 'productions.show'
        return view('productions.show', compact('production'));
    }

    /**
     * Muestra el formulario para editar un lote de producción (función U - Update/Actualizar).
     */
    public function edit(Production $production)
    {
        // Traemos los cultivos para el formulario de edición
        $crops = Crop::all(); 
        
        // Retorna la vista 'productions.edit'
        return view('productions.edit', compact('production', 'crops'));
    }

    /**
     * Actualiza un lote de producción en la base de datos (función U - Update/Actualizar).
     */
    public function update(Request $request, Production $production)
    {
        // 1. Validación de datos
        $request->validate([
            'crop_id' => 'required|exists:crops,id',
            'production_date' => 'required|date',
            'total_quantity' => 'required|numeric|min:1',
            'unit_of_measure' => 'required|string|max:50',
            'total_cost' => 'nullable|numeric|min:0',
            'total_revenue' => 'nullable|numeric|min:0',
        ]);

        // 2. Actualización del registro
        $production->update($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('productions.index')
                         ->with('success', 'La producción ha sido actualizada correctamente.');
    }

    /**
     * Elimina un lote de producción de la base de datos (función D - Delete/Borrar).
     */
    public function destroy(Production $production)
    {
        // 1. Eliminación del registro
        $production->delete();

        // 2. Redireccionar con éxito
        return redirect()->route('productions.index')
                         ->with('success', 'El lote de producción ha sido eliminado.');
    }
}
