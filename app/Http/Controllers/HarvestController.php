<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use App\Http\Requests\HarvestRequest;

class HarvestController extends Controller
{
    public function index()
    {
        $harvests = Harvest::paginate();

        return view('harvests.index', compact('harvests'))
            ->with('i', (request()->input('page', 1) - 1) * $harvests->perPage());
    }

    public function create()
    {
        $harvest = new Harvest();
        return view('harvests.create', compact('harvest'));
    }

    public function store(HarvestRequest $request)
    {
        Harvest::create($request->validated());

        return redirect()->route('harvests.index')
            ->with('success', 'cosecha a sido creada correctamente.');
    }

    public function show($id)
    {
        $harvest = Harvest::find($id);
        return view('harvest.show', compact('harvest'));
    }


    public function edit($id)
    {
        $harvest = Harvest::find($id);
        return view('harvest.edit', compact('harvest'));
    }

    public function update(HarvestRequest $request, Harvest $harvest)
    {
        $harvest->update($request->validated());

        return redirect()->route('harvests.index')
            ->with('success', 'Cosecha a sido actualizada correctamente.');
    }

    public function destroy($id)
    {
        Harvest::find($id)->delete();

        return redirect()->route('harvests.index')
            ->with('success', 'Cosecha a sido eliminada correctamente.');
    }
}
