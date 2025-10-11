<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest; // Usando el Form Request

class CustomerController extends Controller
{
    /**
     * Muestra una lista de todos los clientes.
     */
    public function index()
    {
        $customers = Customer::paginate();

        return view('customers.index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * $customers->perPage());
    }
    /**
     * Muestra el formulario para crear un nuevo cliente.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Guarda un nuevo cliente en la base de datos.
     */
    public function store(CustomerRequest $request) // Usamos CustomerRequest para validación
    {
        // La validación se hace automáticamente por CustomerRequest
        Customer::create($request->validated());

        return redirect()->route('customers.index')
                         ->with('success', '¡Cliente registrado con éxito!');
    }

    /**
     * Muestra los detalles de un cliente específico.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Muestra el formulario para editar un cliente.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Actualiza un cliente en la base de datos.
     */
    public function update(CustomerRequest $request, Customer $customer) // Usamos CustomerRequest para validación
    {
        // La validación se hace automáticamente por CustomerRequest
        $customer->update($request->validated());

        return redirect()->route('customers.index')
                         ->with('success', 'El cliente ha sido actualizado correctamente.');
    }

    /**
     * Elimina un cliente de la base de datos.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')
                         ->with('success', 'El cliente ha sido eliminado del registro.');
    }
}
