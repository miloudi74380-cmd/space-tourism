<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('technologies.view');

        $technologies = Technology::orderBy('name_en')->paginate(10);

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('technologies.create');

        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('technologies.create');

        $validated = $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'image_landscape' => 'required|string|max:255',
            'image_portrait' => 'required|string|max:255',
        ]);

        Technology::create($validated);

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technologie créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        $this->authorize('technologies.view');

        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        $this->authorize('technologies.edit');

        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $this->authorize('technologies.edit');

        $validated = $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'image_landscape' => 'required|string|max:255',
            'image_portrait' => 'required|string|max:255',
        ]);

        $technology->update($validated);

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technologie mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $this->authorize('technologies.delete');

        $technology->delete();

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technologie supprimée avec succès.');
    }
}
