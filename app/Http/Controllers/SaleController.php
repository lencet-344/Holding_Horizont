<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Production;
use App\Http\Requests\SaleRequest; // Usando el Form Request

class SaleController extends Controller
{
    /**
     * Muestra una lista de todas las ventas.
     */
    public function index()
    {
        // Trae ventas, cargando el cliente y la producción relacionados
        $sales = Sale::with(['customer', 'production'])->latest()->get(); 
        return view('sales.index', compact('sales'));
    }

    /**
     * Muestra el formulario para crear una nueva venta.
     */
    public function create()
    {
        $customers = Customer::all();
        $productions = Production::all();
        return view('sales.create', compact('customers', 'productions'));
    }

    /**
     * Guarda una nueva venta en la base de datos.
     */
    public function store(SaleRequest $request) // Usamos SaleRequest para validación
    {
        // La validación se hace automáticamente por SaleRequest
        Sale::create($request->validated());

        return redirect()->route('sales.index')
                         ->with('success', '¡Venta registrada con éxito!');
    }

    /**
     * Muestra los detalles de una venta específica.
     */
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Muestra el formulario para editar una venta.
     */
    public function edit(Sale $sale)
    {
        $customers = Customer::all();
        $productions = Production::all();
        return view('sales.edit', compact('sale', 'customers', 'productions'));
    }

    /**
     * Actualiza una venta en la base de datos.
     */
    public function update(SaleRequest $request, Sale $sale) // Usamos SaleRequest para validación
    {
        // La validación se hace automáticamente por SaleRequest
        $sale->update($request->validated());

        return redirect()->route('sales.index')
                         ->with('success', 'La venta ha sido actualizada correctamente.');
    }

    /**
     * Elimina una venta de la base de datos.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')
                         ->with('success', 'La venta ha sido eliminada del registro.');
    }
}

