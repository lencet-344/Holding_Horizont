<?php

namespace App\Http\Controllers;

use App\Models\Post_harvest;
use App\Http\Requests\Post_harvestRequest;

class Post_harvestController extends Controller
{
    public function index()
    {
        $Post_harvests = Post_harvest::paginate();

        return view('Post_harvests.index', compact('Post_harvests'))
            ->with('i', (request()->input('page', 1) - 1) * $Post_harvests->perPage());
    }

    public function create()
    {
        $Post_harvest = new Post_harvest();
        return view('Post_harvests.create', compact('Post_harvest'));
    }

    public function store(Post_harvestRequest $request)
    {
        Post_harvest::create($request->validated());

        return redirect()->route('post_harvests.index')
            ->with('success', 'Despues de la cosecha a sido creada correctamente.');
    }

    public function show($id)
    {
        $post_harvest = Post_harvest::find($id);
        return view('post_harvest.show', compact('post_harvest'));
    }


    public function edit($id)
    {
        $post_harvest = Post_harvest::find($id);
        return view('post_harvest.edit', compact('post_harvest'));
    }

    public function update(Post_harvestRequest $request, Post_harvest $post_harvest)
    {
        $post_harvest->update($request->validated());

        return redirect()->route('post_harvests.index')
            ->with('success', 'Despues de la cosecha a sido actualizada correctamente.');
    }

    public function destroy($id)
    {
        Post_harvest::find($id)->delete();

        return redirect()->route('post_harvests.index')
            ->with('success', 'Despues de cosecha a sido eliminada correctamente.');
    }
}
