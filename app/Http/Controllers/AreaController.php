<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Requests\AreaRequest;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::paginate();

        return view('area.index', compact('areas'))
            ->with('i', (request()->input('page', 1) - 1) * $areas->perPage());
    }

    public function create()
    {
        $area = new Area();
        return view('area.create', compact('area'));
    }

    public function store(AreaRequest $request)
    {
        Area::create($request->validated());

        return redirect()->route('areas.index')
            ->with('success', 'Area a sido creada correctamente.');
    }

    public function show($id)
    {
        $area = Area::find($id);
        return view('area.show', compact('area'));
    }


    public function edit($id)
    {
        $area = Area::find($id);
        return view('area.edit', compact('area'));
    }

    public function update(AreaRequest $request, Area $area)
    {
        $area->update($request->validated());

        return redirect()->route('areas.index')
            ->with('success', 'Area a sido actualizada correctamente.');
    }

    public function destroy($id)
    {
        Area::find($id)->delete();

        return redirect()->route('areas.index')
            ->with('success', 'Area a sido eliminada correctamente.');
    }
}
