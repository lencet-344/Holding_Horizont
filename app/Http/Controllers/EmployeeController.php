<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate();

        return view('employee.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * $employees->perPage());
    }

    public function create()
    {
        $student = new Employee();
        return view('employee.create', compact('employee'));
    }

    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('employees.index')
            ->with('success', 'Empleados a sido creado correctamente.');
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.show', compact('employee'));
    }

    
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return redirect()->route('employees.index')
            ->with('success', 'Empleado a sido actualizado correctamente.');
    }

    public function destroy($id)
    {
        Employee::find($id)->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Empleado a sido eliminado correctamente.');
    }
}
