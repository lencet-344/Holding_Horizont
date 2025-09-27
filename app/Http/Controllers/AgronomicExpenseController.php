<?php

namespace App\Http\Controllers;

use App\Models\AgronomicExpense; // Modelo principal de gastos
use App\Models\Sowing; // Para vincular el gasto a una siembra
use Illuminate\Http\Request;

class AgronomicExpenseController extends Controller
{
    /**
     * Muestra una lista de todos los gastos agronómicos (función R - Read/Leer).
     */
    public function index()
    {
        // Trae todos los gastos, cargando la siembra relacionada
        $expenses = AgronomicExpense::with('sowing')->latest()->get(); 

        // Retorna la vista 'agronomic_expenses.index'
        return view('agronomic_expenses.index', compact('expenses'));
    }

    /**
     * Muestra el formulario para crear un nuevo gasto (función C - Create/Crear).
     */
    public function create()
    {
        // Traemos todas las siembras para seleccionar a cuál pertenece el gasto
        $sowings = Sowing::all();

        // Retorna la vista 'agronomic_expenses.create'
        return view('agronomic_expenses.create', compact('sowings'));
    }

    /**
     * Guarda un nuevo gasto en la base de datos (función C - Create/Crear).
     */
    public function store(Request $request)
    {
        // 1. Validación de datos
        $request->validate([
            'sowing_id' => 'required|exists:sowings,id',
            'expense_type' => 'required|string|max:100', // Ej: Semillas, Fertilizante, Labor
            'activity_type' => 'required|string|max:100', // Ej: Siembra, Riego, Cosecha
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        // 2. Creación del registro
        AgronomicExpense::create($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('agronomic_expenses.index')
                         ->with('success', '¡Gasto agronómico registrado con éxito!');
    }

    /**
     * Muestra los detalles de un gasto específico (función R - Read/Leer).
     */
    public function show(AgronomicExpense $expense)
    {
        // Retorna la vista 'agronomic_expenses.show'
        return view('agronomic_expenses.show', compact('expense'));
    }

    /**
     * Muestra el formulario para editar un gasto (función U - Update/Actualizar).
     */
    public function edit(AgronomicExpense $expense)
    {
        // Traemos las siembras para el formulario de edición
        $sowings = Sowing::all(); 
        
        // Retorna la vista 'agronomic_expenses.edit'
        return view('agronomic_expenses.edit', compact('expense', 'sowings'));
    }

    /**
     * Actualiza un gasto en la base de datos (función U - Update/Actualizar).
     */
    public function update(Request $request, AgronomicExpense $expense)
    {
        // 1. Validación de datos
        $request->validate([
            'sowing_id' => 'required|exists:sowings,id',
            'expense_type' => 'required|string|max:100',
            'activity_type' => 'required|string|max:100',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        // 2. Actualización del registro
        $expense->update($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('agronomic_expenses.index')
                         ->with('success', 'El gasto ha sido actualizado correctamente.');
    }

    /**
     * Elimina un gasto de la base de datos (función D - Delete/Borrar).
     */
    public function destroy(AgronomicExpense $expense)
    {
        // 1. Eliminación del registro
        $expense->delete();

        // 2. Redireccionar con éxito
        return redirect()->route('agronomic_expenses.index')
                         ->with('success', 'El gasto ha sido eliminado del registro.');
    }

}