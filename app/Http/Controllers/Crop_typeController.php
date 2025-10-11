<?php

namespace App\Http\Controllers;

use App\Models\Crop_type; // <-- ¡Corregido para coincidir con tu modelo!
use App\Http\Requests\Crop_typeRequest; 
use Illuminate\Http\Request; // Importación base por si acaso

class Crop_typeController extends Controller
{
    public function index()
    {
        $crop_types = Crop_type::paginate();

        return view('crop_types.index', compact('crop_types'))
            ->with('i', (request()->input('page', 1) - 1) * $crop_types->perPage());
    }

    public function create()
    {
        $crop_type = new Crop_type();
        return view('crop_types.create', compact('crop_type'));
    }

    public function store(Crop_typeRequest $request)
    {
        Crop_type::create($request->validated());

        return redirect()->route('crop_types.index')
            ->with('success', 'Tipo de cultivos a sido creada correctamente.');
    }

    public function show($id)
    {
        $crop_type = Crop_type::find($id);
        return view('crop_type.show', compact('crop_type'));
    }


    public function edit($id)
    {
        $crop_type = Crop_type::find($id);
        return view('crop_type.edit', compact('crop_type'));
    }

    public function update(Crop_typeRequest $request, Crop_type $crop_type)
    {
        $crop_type->update($request->validated());

        return redirect()->route('Crop_types.index')
            ->with('success', 'Tipo de cultivo a sido actualizada correctamente.');
    }

    public function destroy($id)
    {
        Crop_type::find($id)->delete();

        return redirect()->route('crop_types.index')
            ->with('success', 'Tipo de cultivo a sido eliminada correctamente.');
    }
}
