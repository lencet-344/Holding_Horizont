<?php

namespace App\Http\Controllers;

use App\Models\Crop; 
use Illuminate\Http\Request;

class CropController extends Controller
{
    /**
     *
     */
    public function index()
    {
        // Trae todos los cultivos (puedes añadir paginación si la lista es muy larga)
        $crops = Crop::all(); 

        
        return view('crops.index', compact('crops'));
    }

    /**
     * Muestra el formulario para crear un nuevo cultivo (función C - Create/Crear).
     */
    public function create()
    {
        // Retorna la vista del formulario
        return view('crops.create');
    }

    /**
     * Guarda un nuevo cultivo en la base de datos (función C - Create/Crear).
     */
    public function store(Request $request)
    {
        // 1. Validación de datos antes de guardar
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'crop_type_id' => 'required|exists:crop_types,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date', // El campo es opcional
        ]);

        // 2. Creación del registro en la base de datos
        Crop::create($request->all());

        // 3. Redireccionar al listado con un mensaje de éxito
        return redirect()->route('crops.index')
                         ->with('success', '¡El nuevo cultivo ha sido sembrado con éxito!');
    }

    /**
     * Muestra los detalles de un cultivo específico (función R - Read/Leer).
     */
    public function show(Crop $crop)
    {
        // Retorna la vista 'crops.show' y le pasa el objeto 'crop'
        return view('crops.show', compact('crop'));
    }

    /**
     * Muestra el formulario para editar un cultivo (función U - Update/Actualizar).
     */
    public function edit(Crop $crop)
    {
        // Retorna la vista 'crops.edit' y le pasa el objeto 'crop'
        return view('crops.edit', compact('crop'));
    }

    /**
     * Actualiza un cultivo en la base de datos (función U - Update/Actualizar).
     */
    public function update(Request $request, Crop $crop)
    {
        // 1. Validación de datos
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'crop_type_id' => 'required|exists:crop_types,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        // 2. Actualización del registro
        $crop->update($request->all());

        // 3. Redireccionar con mensaje de éxito
        return redirect()->route('crops.index')
                         ->with('success', 'El cultivo ha sido actualizado correctamente.');
    }

    /**
     * Elimina un cultivo de la base de datos (función D - Delete/Borrar).
     */
    public function destroy(Crop $crop)
    {
        // 1. Eliminación del registro
        $crop->delete();

        // 2. Redireccionar con mensaje de éxito
        return redirect()->route('crops.index')
                         ->with('success', 'El cultivo ha sido eliminado del registro.');
    }
}
