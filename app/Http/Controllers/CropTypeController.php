<?php

namespace App\Http\Controllers;

use App\Models\CropType; // Modelo principal para tipos de cultivo
use Illuminate\Http\Request;

class CropTypeController extends Controller
{
    /**
     * Muestra una lista de todos los tipos de cultivo (función R - Read/Leer).
     */
    public function index()
    {
        // Traemos todos los tipos de cultivo
        $cropTypes = CropType::latest()->get(); 

        // Retorna la vista 'crop_types.index'
        return view('crop_types.index', compact('cropTypes'));
    }

    /**
     * Muestra el formulario para crear un nuevo tipo de cultivo (función C - Create/Crear).
     */
    public function create()
    {
        // Retorna la vista 'crop_types.create'
        return view('crop_types.create');
    }

    /**
     * Guarda un nuevo tipo de cultivo en la base de datos (función C - Create/Crear).
     */
    public function store(Request $request)
    {
        // 1. Validación de datos
        $request->validate([
            'name' => 'required|string|max:255|unique:crop_types,name', // Aseguramos que el nombre sea único
            'description' => 'nullable|string',
            'estimated_days_to_harvest' => 'nullable|integer|min:1',
        ]);

        // 2. Creación del registro
        CropType::create($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('crop_types.index')
                         ->with('success', '¡Tipo de cultivo registrado con éxito!');
    }

    /**
     * Muestra los detalles de un tipo de cultivo específico (función R - Read/Leer).
     */
    public function show(CropType $cropType)
    {
        // Retorna la vista 'crop_types.show'
        return view('crop_types.show', compact('cropType'));
    }

    /**
     * Muestra el formulario para editar un tipo de cultivo (función U - Update/Actualizar).
     */
    public function edit(CropType $cropType)
    {
        // Retorna la vista 'crop_types.edit'
        return view('crop_types.edit', compact('cropType'));
    }

    /**
     * Actualiza un tipo de cultivo en la base de datos (función U - Update/Actualizar).
     */
    public function update(Request $request, CropType $cropType)
    {
        // 1. Validación de datos
        $request->validate([
            'name' => 'required|string|max:255|unique:crop_types,name,' . $cropType->id, // Debe ser único, excepto para el registro actual
            'description' => 'nullable|string',
            'estimated_days_to_harvest' => 'nullable|integer|min:1',
        ]);

        // 2. Actualización del registro
        $cropType->update($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('crop_types.index')
                         ->with('success', 'El tipo de cultivo ha sido actualizado correctamente.');
    }

    /**
     * Elimina un tipo de cultivo de la base de datos (función D - Delete/Borrar).
     */
    public function destroy(CropType $cropType)
    {
        // 1. Eliminación del registro
        $cropType->delete();

        // 2. Redireccionar con éxito
        return redirect()->route('crop_types.index')
                         ->with('success', 'El tipo de cultivo ha sido eliminado del registro.');
    }
}
