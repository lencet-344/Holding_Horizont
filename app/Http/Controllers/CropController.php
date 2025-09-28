<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Area;
use App\Models\Crop_type;
use App\Http\Requests\CropRequest; // Usando el Form Request

class CropController extends Controller
{
    /**
     * Muestra una lista de todos los cultivos.
     */
    public function index()
    {
        // Trae cultivos, cargando el área y el tipo de cultivo relacionados
        $crops = Crop::with(['area', 'cropType'])->latest()->get(); 
        return view('crops.index', compact('crops'));
    }

    /**
     * Muestra el formulario para crear un nuevo cultivo.
     */
    public function create()
    {
        $areas = Area::all();
        $cropTypes = Crop_type::all();
        return view('crops.create', compact('areas', 'cropTypes'));
    }

    /**
     * Guarda un nuevo cultivo en la base de datos.
     */
    public function store(CropRequest $request) // Usamos CropRequest para validación
    {
        // La validación se hace automáticamente por CropRequest
        Crop::create($request->validated()); 

        return redirect()->route('crops.index')
                         ->with('success', '¡Cultivo registrado con éxito!');
    }

    /**
     * Muestra los detalles de un cultivo específico.
     */
    public function show(Crop $crop)
    {
        return view('crops.show', compact('crop'));
    }

    /**
     * Muestra el formulario para editar un cultivo.
     */
    public function edit(Crop $crop)
    {
        $areas = Area::all();
        $cropTypes = Crop_type::all();
        return view('crops.edit', compact('crop', 'areas', 'cropTypes'));
    }

    /**
     * Actualiza un cultivo en la base de datos.
     */
    public function update(CropRequest $request, Crop $crop) // Usamos CropRequest para validación
    {
        // La validación se hace automáticamente por CropRequest
        $crop->update($request->validated()); 

        return redirect()->route('crops.index')
                         ->with('success', 'El cultivo ha sido actualizado correctamente.');
    }

    /**
     * Elimina un cultivo de la base de datos.
     */
    public function destroy(Crop $crop)
    {
        $crop->delete();
        return redirect()->route('crops.index')
                         ->with('success', 'El cultivo ha sido eliminado del registro.');
    }
}
