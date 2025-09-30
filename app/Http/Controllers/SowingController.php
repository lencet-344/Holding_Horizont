<?php

namespace App\Http\Controllers;

use App\Models\Sowing;
use App\Http\Requests\SowingRequest;

class SowingController extends Controller
{
    public function index()
    {
        $sowings = Sowing::paginate();

        return view('sowing.index', compact('sowings'))
            ->with('i', (request()->input('page', 1) - 1) * $sowings->perPage());
    }

    public function create()
    {
        $sowing = new Sowing();
        return view('sowing.create', compact('sowing'));
    }

    public function store(SowingRequest $request)
    {
        Sowing::create($request->validated());

        return redirect()->route('sowings.index')
            ->with('success', 'Siembra a sido creada correctamente.');
    }

    public function show($id)
    {
        $sowing = Sowing::find($id);
        return view('sowing.show', compact('sowing'));
    }


    public function edit($id)
    {
        $sowing = Sowing::find($id);
        return view('sowing.edit', compact('sowing'));
    }

    public function update(SowingRequest $request, Sowing $sowing)
    {
        $sowing->update($request->validated());

        return redirect()->route('sowings.index')
            ->with('success', 'Siembra a sido actualizada correctamente.');
    }

    public function destroy($id)
    {
        Sowing::find($id)->delete();

        return redirect()->route('sowings.index')
            ->with('success', 'Siembra a sido eliminada correctamente.');
    }
}
