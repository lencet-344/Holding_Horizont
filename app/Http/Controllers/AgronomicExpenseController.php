<?php

namespace App\Http\Controllers;

use App\Models\Agronomic_expense; 
use App\Models\Sowing; 
use App\Http\Requests\Agronomic_expenseRequest; // Usando el Form Request

class AgronomicExpenseController extends Controller
{
    /**
     * Muestra una lista de todos los gastos agronómicos.
     */
    public function index()
    {
        // Trae todos los gastos, cargando la siembra relacionada
        $expenses = Agronomic_expense::with('sowing')->latest()->get(); 
        return view('agronomic_expenses.index', compact('expenses'));
    }

    /**
     * Muestra el formulario para crear un nuevo gasto.
     */
    public function create()
    {
        // Traemos todas las siembras para seleccionar a cuál pertenece el gasto
        $sowings = Sowing::all();
        return view('agronomic_expenses.create', compact('sowings'));
    }

    /**
     * Guarda un nuevo gasto en la base de datos.
     */
    public function store(Agronomic_expenseRequest $request) // Usamos AgronomicExpenseRequest para validación
    {
        // La validación se hace automáticamente por AgronomicExpenseRequest
        Agronomic_expense::create($request->validated());

        return redirect()->route('agronomic_expenses.index')
                         ->with('success', '¡Gasto agronómico registrado con éxito!');
    }

    /**
     * Muestra los detalles de un gasto específico.
     */
    public function show(Agronomic_expense $expense)
    {
        return view('agronomic_expenses.show', compact('expense'));
    }

    /**
     * Muestra el formulario para editar un gasto.
     */
    public function edit(Agronomic_expense $expense)
    {
        // Traemos las siembras para el formulario de edición
        $sowings = Sowing::all(); 
        return view('agronomic_expenses.edit', compact('expense', 'sowings'));
    }

    /**
     * Actualiza un gasto en la base de datos.
     */
    public function update(Agronomic_expenseRequest $request, Agronomic_expense $expense) // Usamos AgronomicExpenseRequest para validación
    {
        // La validación se hace automáticamente por AgronomicExpenseRequest
        $expense->update($request->validated());

        return redirect()->route('agronomic_expenses.index')
                         ->with('success', 'El gasto ha sido actualizado correctamente.');
    }

    /**
     * Elimina un gasto de la base de datos.
     */
    public function destroy(Agronomic_expense $expense)
    {
        $expense->delete();
        return redirect()->route('agronomic_expenses.index')
                         ->with('success', 'El gasto ha sido eliminado del registro.');
    }
}
