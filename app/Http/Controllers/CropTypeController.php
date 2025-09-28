<?php

namespace App\Http\Controllers;

use App\Models\Crop_type; // <-- ¡Corregido para coincidir con tu modelo!
use App\Http\Requests\Crop_typeRequest; 
use Illuminate\Http\Request; // Importación base por si acaso

class CropTypeController extends Controller
{
    /**
     * Muestra una lista de todos los tipos de cultivo.
     */
    public function index()
    {
        $cropTypes = Crop_type::latest()->get();
        return view('crop_types.index', compact('cropTypes'));
    }

    /**
     * Muestra el formulario para crear un nuevo tipo de cultivo.
     */
    public function create()
    {
        return view('crop_types.create');
    }

    /**
     * Guarda un nuevo tipo de cultivo en la base de datos.
     */
    public function store(Crop_typeRequest $request)
    {
        // La validación se hace automáticamente por Crop_typeRequest
        Crop_type::create($request->validated());

        return redirect()->route('crop_types.index')
                         ->with('success', 'Tipo de cultivo registrado con éxito.');
    }

    /**
     * Muestra los detalles de un tipo de cultivo específico.
     */
    public function show(Crop_type $cropType) // <-- Usando Crop_type en el type-hint
    {
        return view('crop_types.show', compact('cropType'));
    }

    /**
     * Muestra el formulario para editar un tipo de cultivo.
     */
    public function edit(Crop_type $cropType) // <-- Usando Crop_type en el type-hint
    {
        return view('crop_types.edit', compact('cropType'));
    }

    /**
     * Actualiza un tipo de cultivo en la base de datos.
     */
    public function update(Crop_typeRequest $request, Crop_type $cropType) // <-- Usando Crop_type en el type-hint
    {
        // La validación se hace automáticamente por Crop_typeRequest
        $cropType->update($request->validated());

        return redirect()->route('crop_types.index')
                         ->with('success', 'Tipo de cultivo actualizado correctamente.');
    }

    /**
     * Elimina un tipo de cultivo de la base de datos.
     */
    public function destroy(Crop_type $cropType) // <-- Usando Crop_type en el type-hint
    {
        $cropType->delete();
        return redirect()->route('crop_types.index')
                         ->with('success', 'Tipo de cultivo eliminado del registro.');
    }
}
