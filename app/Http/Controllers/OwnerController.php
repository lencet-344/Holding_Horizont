<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Requests\OwnerRequest;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::paginate();

        return view('owners.index', compact('owners'))
            ->with('i', (request()->input('page', 1) - 1) * $owners->perPage());
    }

    public function create()
    {
        $owner = new Owner();
        return view('owners.create', compact('owner'));
    }

    public function store(OwnerRequest $request)
    {
        Owner::create($request->validated());

        return redirect()->route('owners.index')
            ->with('success', 'Propietario a sido creada correctamente.');
    }

    public function show($id)
    {
        $owner = Owner::find($id);
        return view('owner.show', compact('owner'));
    }


    public function edit($id)
    {
        $owner = Owner::find($id);
        return view('owner.edit', compact('owner'));
    }

    public function update(OwnerRequest $request, Owner $owner)
    {
        $owner->update($request->validated());

        return redirect()->route('owners.index')
            ->with('success', 'Propietario a sido actualizada correctamente.');
    }

    public function destroy($id)
    {
        Owner::find($id)->delete();

        return redirect()->route('owners.index')
            ->with('success', 'Propietario a sido eliminada correctamente.');
    }
}
