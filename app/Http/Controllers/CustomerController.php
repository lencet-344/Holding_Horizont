<?php

namespace App\Http\Controllers;

use App\Models\Customer; // Modelo para interactuar con la tabla 'customers'
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Muestra una lista de todos los clientes (función R - Read/Leer).
     */
    public function index()
    {
        // Trae todos los clientes
        $customers = Customer::latest()->get(); 

        // Retorna la vista 'customers.index'
        return view('customers.index', compact('customers'));
    }

    /**
     * Muestra el formulario para crear un nuevo cliente (función C - Create/Crear).
     */
    public function create()
    {
        // Retorna la vista 'customers.create'
        return view('customers.create');
    }

    /**
     * Guarda un nuevo cliente en la base de datos (función C - Create/Crear).
     */
    public function store(Request $request)
    {
        // 1. Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'address' => 'nullable|string|max:255', // Asumo que address es opcional
        ]);

        // 2. Creación del registro
        Customer::create($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('customers.index')
                         ->with('success', '¡Cliente registrado con éxito!');
    }

    /**
     * Muestra los detalles de un cliente específico (función R - Read/Leer).
     */
    public function show(Customer $customer)
    {
        // Retorna la vista 'customers.show'
        return view('customers.show', compact('customer'));
    }

    /**
     * Muestra el formulario para editar un cliente (función U - Update/Actualizar).
     */
    public function edit(Customer $customer)
    {
        // Retorna la vista 'customers.edit'
        return view('customers.edit', compact('customer'));
    }

    /**
     * Actualiza un cliente en la base de datos (función U - Update/Actualizar).
     */
    public function update(Request $request, Customer $customer)
    {
        // 1. Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        // 2. Actualización del registro
        $customer->update($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('customers.index')
                         ->with('success', 'El cliente ha sido actualizado correctamente.');
    }

    /**
     * Elimina un cliente de la base de datos (función D - Delete/Borrar).
     */
    public function destroy(Customer $customer)
    {
        // 1. Eliminación del registro
        $customer->delete();

        // 2. Redireccionar con éxito
        return redirect()->route('customers.index')
                         ->with('success', 'El cliente ha sido eliminado del registro.');
    }
}
