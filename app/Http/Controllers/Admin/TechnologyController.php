<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image_landscape' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_portrait' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle landscape image upload
        if ($request->hasFile('image_landscape')) {
            $landscapePath = $request->file('image_landscape')->store('technologies', 'public');
            $validated['image_landscape'] = '/storage/' . $landscapePath;
        }

        // Handle portrait image upload
        if ($request->hasFile('image_portrait')) {
            $portraitPath = $request->file('image_portrait')->store('technologies', 'public');
            $validated['image_portrait'] = '/storage/' . $portraitPath;
        }

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
            'image_landscape' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_portrait' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle landscape image upload if new image provided
        if ($request->hasFile('image_landscape')) {
            // Delete old landscape image if it exists in storage
            if ($technology->image_landscape && str_starts_with($technology->image_landscape, '/storage/')) {
                $oldLandscapePath = str_replace('/storage/', '', $technology->image_landscape);
                Storage::disk('public')->delete($oldLandscapePath);
            }

            // Upload new landscape image
            $landscapePath = $request->file('image_landscape')->store('technologies', 'public');
            $validated['image_landscape'] = '/storage/' . $landscapePath;
        } else {
            // Keep existing landscape image
            unset($validated['image_landscape']);
        }

        // Handle portrait image upload if new image provided
        if ($request->hasFile('image_portrait')) {
            // Delete old portrait image if it exists in storage
            if ($technology->image_portrait && str_starts_with($technology->image_portrait, '/storage/')) {
                $oldPortraitPath = str_replace('/storage/', '', $technology->image_portrait);
                Storage::disk('public')->delete($oldPortraitPath);
            }

            // Upload new portrait image
            $portraitPath = $request->file('image_portrait')->store('technologies', 'public');
            $validated['image_portrait'] = '/storage/' . $portraitPath;
        } else {
            // Keep existing portrait image
            unset($validated['image_portrait']);
        }

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

        // Delete landscape image if it exists in storage
        if ($technology->image_landscape && str_starts_with($technology->image_landscape, '/storage/')) {
            $landscapePath = str_replace('/storage/', '', $technology->image_landscape);
            Storage::disk('public')->delete($landscapePath);
        }

        // Delete portrait image if it exists in storage
        if ($technology->image_portrait && str_starts_with($technology->image_portrait, '/storage/')) {
            $portraitPath = str_replace('/storage/', '', $technology->image_portrait);
            Storage::disk('public')->delete($portraitPath);
        }

        $technology->delete();

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technologie supprimée avec succès.');
    }
}
