<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Planet;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlanetController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('planets.view');

        $planets = Planet::orderBy('name_en')->paginate(10);

        return view('admin.planets.index', compact('planets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('planets.create');

        return view('admin.planets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('planets.create');

        $validated = $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'distance_fr' => 'required|string|max:255',
            'distance_en' => 'required|string|max:255',
            'travel_fr' => 'required|string|max:255',
            'travel_en' => 'required|string|max:255',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('planets', 'public');
            $validated['image'] = '/storage/' . $imagePath;
        }

        Planet::create($validated);

        return redirect()->route('admin.planets.index')
            ->with('success', 'Planète créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Planet $planet)
    {
        $this->authorize('planets.view');

        return view('admin.planets.show', compact('planet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planet $planet)
    {
        $this->authorize('planets.edit');

        return view('admin.planets.edit', compact('planet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Planet $planet)
    {
        $this->authorize('planets.edit');

        $validated = $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'distance_fr' => 'required|string|max:255',
            'distance_en' => 'required|string|max:255',
            'travel_fr' => 'required|string|max:255',
            'travel_en' => 'required|string|max:255',
        ]);

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists in storage
            if ($planet->image && str_starts_with($planet->image, '/storage/')) {
                $oldImagePath = str_replace('/storage/', '', $planet->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            // Upload new image
            $imagePath = $request->file('image')->store('planets', 'public');
            $validated['image'] = '/storage/' . $imagePath;
        } else {
            // Keep existing image
            unset($validated['image']);
        }

        $planet->update($validated);

        return redirect()->route('admin.planets.index')
            ->with('success', 'Planète mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planet $planet)
    {
        $this->authorize('planets.delete');

        // Delete image if it exists in storage
        if ($planet->image && str_starts_with($planet->image, '/storage/')) {
            $imagePath = str_replace('/storage/', '', $planet->image);
            Storage::disk('public')->delete($imagePath);
        }

        $planet->delete();

        return redirect()->route('admin.planets.index')
            ->with('success', 'Planète supprimée avec succès.');
    }
}
