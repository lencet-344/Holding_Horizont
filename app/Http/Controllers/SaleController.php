<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer; // Para listas desplegables en formularios
use App\Models\Production; // Para listas desplegables en formularios
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Muestra una lista de todas las ventas (función R - Read/Leer).
     */
    public function index()
    {
        // Trae todas las ventas, cargando los datos del cliente y la producción relacionada
        $sales = Sale::with(['customer', 'production'])->latest()->get(); 

        // Retorna la vista 'sales.index'
        return view('sales.index', compact('sales'));
    }

    /**
     * Muestra el formulario para crear una nueva venta (función C - Create/Crear).
     */
    public function create()
    {
        // Traemos clientes y producciones para usarlos en el formulario
        $customers = Customer::all();
        $productions = Production::all(); 

        // Retorna la vista 'sales.create'
        return view('sales.create', compact('customers', 'productions'));
    }

    /**
     * Guarda una nueva venta en la base de datos (función C - Create/Crear).
     */
    public function store(Request $request)
    {
        // 1. Validación de datos
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'production_id' => 'required|exists:productions,id',
            'sale_date' => 'required|date',
            'quantity_sold' => 'required|numeric|min:1',
            'price_per_unit' => 'required|numeric|min:0',
        ]);

        // 2. Creación del registro
        Sale::create($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('sales.index')
                         ->with('success', '¡Venta registrada con éxito!');
    }

    /**
     * Muestra los detalles de una venta específica (función R - Read/Leer).
     */
    public function show(Sale $sale)
    {
        // Retorna la vista 'sales.show'
        return view('sales.show', compact('sale'));
    }

    /**
     * Muestra el formulario para editar una venta (función U - Update/Actualizar).
     */
    public function edit(Sale $sale)
    {
        // Traemos clientes y producciones para el formulario de edición
        $customers = Customer::all();
        $productions = Production::all(); 
        
        // Retorna la vista 'sales.edit'
        return view('sales.edit', compact('sale', 'customers', 'productions'));
    }

    /**
     * Actualiza una venta en la base de datos (función U - Update/Actualizar).
     */
    public function update(Request $request, Sale $sale)
    {
        // 1. Validación de datos
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'production_id' => 'required|exists:productions,id',
            'sale_date' => 'required|date',
            'quantity_sold' => 'required|numeric|min:1',
            'price_per_unit' => 'required|numeric|min:0',
        ]);

        // 2. Actualización del registro
        $sale->update($request->all());

        // 3. Redireccionar con éxito
        return redirect()->route('sales.index')
                         ->with('success', 'La venta ha sido actualizada correctamente.');
    }

    /**
     * Elimina una venta de la base de datos (función D - Delete/Borrar).
     */
    public function destroy(Sale $sale)
    {
        // 1. Eliminación del registro
        $sale->delete();

        // 2. Redireccionar con éxito
        return redirect()->route('sales.index')
                         ->with('success', 'La venta ha sido eliminada del registro.');
    }
}
