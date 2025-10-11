<?php

namespace App\Http\Controllers;

use App\Models\Agronomic_expense; 
use App\Models\Sowing; 
use App\Http\Requests\Agronomic_expenseRequest; // Usando el Form Request

class Agronomic_expenseController extends Controller
{
    /**
     * Muestra una lista de todos los gastos agronómicos.
     */
    public function index()
    {
        $agronomic_expenses = Agronomic_expense::paginate();

        return view('agronomic_expenses.index', compact('agronomic_expenses'))
            ->with('i', (request()->input('page', 1) - 1) * $agronomic_expenses->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo gasto.
     */
    public function create()
    {
        // Traemos todas las siembras para seleccionar a cuál pertenece el gasto
        $agronomic_expenses = Agronomic_expense::all();
        return view('agronomic_expenses.create', compact('agronomic_expenses'));
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
    public function show(Agronomic_expense $agronomic_expenses)
    {
        return view('agronomic_expenses.show', compact('expense'));
    }

    /**
     * Muestra el formulario para editar un gasto.
     */
    public function edit(Agronomic_expense $agronomic_expenses)
    {
        // Traemos las siembras para el formulario de edición
        $agronomic_expenses = Agronomic_expense::all();
        return view('agronomic_expenses.edit', compact('expense', 'agronomic_expenses'));
    }

    /**
     * Actualiza un gasto en la base de datos.
     */
    public function update(Agronomic_expenseRequest $request, Agronomic_expense $agronomic_expenses) // Usamos AgronomicExpenseRequest para validación
    {
        // La validación se hace automáticamente por AgronomicExpenseRequest
        $agronomic_expenses->update($request->validated());

        return redirect()->route('agronomic_expenses.index')
                         ->with('success', 'El gasto ha sido actualizado correctamente.');
    }

    /**
     * Elimina un gasto de la base de datos.
     */
    public function destroy(Agronomic_expense $agronomic_expenses)
    {
        $agronomic_expenses->delete();
        return redirect()->route('agronomic_expenses.index')
                         ->with('success', 'El gasto ha sido eliminado del registro.');
    }
}
