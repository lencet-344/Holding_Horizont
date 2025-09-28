<?php

namespace App\Http\Controllers;

use App\Models\Insecticide; // Modelo principal
use App\Models\AgronomicExpense; // Para vincular al gasto agronómico
use Illuminate\Http\Request;

class InsecticideController extends Controller
{
    /**
     * Muestra una lista de todas las aplicaciones de insecticida (función R - Read/Leer).
     */
    public function index()
    {
        // Traemos todas las aplicaciones, cargando el gasto agronómico relacionado
        $insecticides = Insecticide::with('agronomicExpense')->latest()->get(); 

        // Retorna la vista 'insecticides.index'
        return view('insecticides.index', compact('insecticides'));
    }

    /**
     * Muestra el formulario para crear una nueva aplicación (función C - Create/Crear).
     */
    public function create()
    {
        // Traemos todos los gastos agronómicos (que pueden ser la compra del producto)
        $expenses = AgronomicExpense::all();

        // Retorna la vista 'insecticides.create'
        return view('insecticides.create', compact('expenses'));
    }

    /**
     * Guarda una nueva aplicación de insecticida en la base de datos (función C - Create/Crear).
     */
    public function store(Request $request)
    {
        // 1. Validación de datos
        $request->validate([
            'agronomic_expense_id' => 'required|exists:agronomic_expenses,id',
            'name' => 'required|string|max:255',
            'application_date' => 'required|date',
            'quantity_applied' => 'required|numeric|min:0.01',
            'unit_of_measure' => 'required|string|max:50',
            'application_method' => 'nullable|string|max:100', // Ej: Fumigación, Riego
        ]);

        // 2. Creación del registro
        Insecticide::create($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('insecticides.index')
                         ->with('success', '¡Aplicación de insecticida registrada con éxito!');
    }

    /**
     * Muestra los detalles de una aplicación específica (función R - Read/Leer).
     */
    public function show(Insecticide $insecticide)
    {
        // Retorna la vista 'insecticides.show'
        return view('insecticides.show', compact('insecticide'));
    }

    /**
     * Muestra el formulario para editar una aplicación (función U - Update/Actualizar).
     */
    public function edit(Insecticide $insecticide)
    {
        // Traemos los gastos para el formulario de edición
        $expenses = AgronomicExpense::all(); 
        
        // Retorna la vista 'insecticides.edit'
        return view('insecticides.edit', compact('insecticide', 'expenses'));
    }

    /**
     * Actualiza una aplicación en la base de datos (función U - Update/Actualizar).
     */
    public function update(Request $request, Insecticide $insecticide)
    {
        // 1. Validación de datos
        $request->validate([
            'agronomic_expense_id' => 'required|exists:agronomic_expenses,id',
            'name' => 'required|string|max:255',
            'application_date' => 'required|date',
            'quantity_applied' => 'required|numeric|min:0.01',
            'unit_of_measure' => 'required|string|max:50',
            'application_method' => 'nullable|string|max:100',
        ]);

        // 2. Actualización del registro
        $insecticide->update($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('insecticides.index')
                         ->with('success', 'La aplicación ha sido actualizada correctamente.');
    }

    /**
     * Elimina una aplicación de la base de datos (función D - Delete/Borrar).
     */
    public function destroy(Insecticide $insecticide)
    {
        // 1. Eliminación del registro
        $insecticide->delete();

        // 2. Redireccionar con éxito
        return redirect()->route('insecticides.index')
                         ->with('success', 'La aplicación de insecticida ha sido eliminada del registro.');
    }
}
