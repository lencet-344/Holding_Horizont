<?php

namespace App\Http\Controllers;

use App\Models\Preparation;
use App\Http\Requests\PreparationRequest;

class PreparationController extends Controller
{
    public function index()
    {
        $preparations = Preparation::paginate();

        return view('preparation.index', compact('preparations'))
            ->with('i', (request()->input('page', 1) - 1) * $preparations->perPage());
    }

    public function create()
    {
        $preparation = new Preparation();
        return view('preparation.create', compact('preparation'));
    }

    public function store(PreparationRequest $request)
    {
        Preparation::create($request->validated());

        return redirect()->route('preparations.index')
            ->with('success', 'Preparacion a sido creada correctamente.');
    }

    public function show($id)
    {
        $preparation = Preparation::find($id);
        return view('preparation.show', compact('preparation'));
    }


    public function edit($id)
    {
        $preparation = Preparation::find($id);
        return view('preparation.edit', compact('preparation'));
    }

    public function update(PreparationRequest $request, Preparation $preparation)
    {
        $preparation->update($request->validated());

        return redirect()->route('preparations.index')
            ->with('success', 'Preparacion a sido actualizada correctamente.');
    }

    public function destroy($id)
    {
        Preparation::find($id)->delete();

        return redirect()->route('preparations.index')
            ->with('success', 'Preparacion a sido eliminada correctamente.');
    }
}
