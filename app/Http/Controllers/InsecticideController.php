<?php

namespace App\Http\Controllers;

use App\Models\Insecticide; 
use App\Models\Agronomic_expense; 
use App\Http\Requests\InsecticideRequest; // Usando el Form Request (Asumido)

class InsecticideController extends Controller
{
    /**
     * Muestra una lista de todas las aplicaciones de insecticida.
     */
    public function index()
    {
        $insecticides = Insecticide::with('agronomic_expense')->latest()->get(); 
        return view('insecticides.index', compact('insecticides'));
    }

    /**
     * Muestra el formulario para crear una nueva aplicación.
     */
    public function create()
    {
        $expenses = Agronomic_expense::all();
        return view('insecticides.create', compact('expenses'));
    }

    /**
     * Guarda una nueva aplicación de insecticida en la base de datos.
     */
    public function store(InsecticideRequest $request) // Usamos InsecticideRequest para validación
    {
        // La validación se hace automáticamente por InsecticideRequest
        Insecticide::create($request->validated());

        return redirect()->route('insecticides.index')
                         ->with('success', '¡Aplicación de insecticida registrada con éxito!');
    }

    /**
     * Muestra los detalles de una aplicación específica.
     */
    public function show(Insecticide $insecticide)
    {
        return view('insecticides.show', compact('insecticide'));
    }

    /**
     * Muestra el formulario para editar una aplicación.
     */
    public function edit(Insecticide $insecticide)
    {
        $expenses = Agronomic_expense::all(); 
        return view('insecticides.edit', compact('insecticide', 'expenses'));
    }

    /**
     * Actualiza una aplicación en la base de datos.
     */
    public function update(InsecticideRequest $request, Insecticide $insecticide) // Usamos InsecticideRequest para validación
    {
        // La validación se hace automáticamente por InsecticideRequest
        $insecticide->update($request->validated());

        return redirect()->route('insecticides.index')
                         ->with('success', 'La aplicación ha sido actualizada correctamente.');
    }

    /**
     * Elimina una aplicación de la base de datos.
     */
    public function destroy(Insecticide $insecticide)
    {
        $insecticide->delete();
        return redirect()->route('insecticides.index')
                         ->with('success', 'La aplicación de insecticida ha sido eliminada del registro.');
    }
}

