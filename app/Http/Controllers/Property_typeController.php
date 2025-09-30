<?php

namespace App\Http\Controllers;

use App\Models\Property_type;
use App\Http\Requests\Property_typeRequest;

class Property_typeController extends Controller
{
    public function index()
    {
        $property_types = Property_type::paginate();

        return view('property_type.index', compact('property_types'))
            ->with('i', (request()->input('page', 1) - 1) * $property_types->perPage());
    }

    public function create()
    {
        $property_type = new Property_type();
        return view('property_type.create', compact('property_type'));
    }

    public function store(Property_typeRequest $request)
    {
        Property_type::create($request->validated());

        return redirect()->route('property_types.index')
            ->with('success', 'Tipo de propietario a sido creada correctamente.');
    }

    public function show($id)
    {
        $property_type = Property_type::find($id);
        return view('property_type.show', compact('property_type'));
    }


    public function edit($id)
    {
        $property_type = Property_type::find($id);
        return view('property_type.edit', compact('property_type'));
    }

    public function update(Property_typeRequest $request, Property_type $property_type)
    {
        $property_type->update($request->validated());

        return redirect()->route('property_types.index')
            ->with('success', 'Tipo de propietario a sido actualizada correctamente.');
    }

    public function destroy($id)
    {
        Property_type::find($id)->delete();

        return redirect()->route('property_types.index')
            ->with('success', 'Tipo de propietario a sido eliminada correctamente.');
    }
}
