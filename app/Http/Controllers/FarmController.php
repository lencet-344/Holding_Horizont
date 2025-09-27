<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Http\Requests\FarmRequest;

class FarmController extends Controller
{
    public function index()
    {
        $farms = Farm::paginate();

        return view('farm.index', compact('farms'))
            ->with('i', (request()->input('page', 1) - 1) * $farms->perPage());
    }

    public function create()
    {
        $farm = new Farm();
        return view('farm.create', compact('farm'));
    }

    public function store(FarmRequest $request)
    {
        Farm::create($request->validated());

        return redirect()->route('farms.index')
            ->with('success', 'Finca a sido creada correctamente.');
    }

    public function show($id)
    {
        $farm = Farm::find($id);
        return view('farm.show', compact('farm'));
    }


    public function edit($id)
    {
        $farm = Farm::find($id);
        return view('farm.edit', compact('farm'));
    }

    public function update(FarmRequest $request, Farm $farm)
    {
        $farm->update($request->validated());

        return redirect()->route('farms.index')
            ->with('success', 'Finca a sido actualizada correctamente.');
    }

    public function destroy($id)
    {
        Farm::find($id)->delete();

        return redirect()->route('farms.index')
            ->with('success', 'Finca a sido eliminada correctamente.');
    }
}
