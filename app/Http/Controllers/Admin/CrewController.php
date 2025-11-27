<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CrewMember;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CrewController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('crew.view');

        $crew = CrewMember::orderBy('name')->paginate(10);

        return view('admin.crew.index', compact('crew'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('crew.create');

        return view('admin.crew.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('crew.create');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role_fr' => 'required|string|max:255',
            'role_en' => 'required|string|max:255',
            'bio_fr' => 'required|string',
            'bio_en' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('crew', 'public');
            $validated['image'] = '/storage/' . $imagePath;
        }

        CrewMember::create($validated);

        return redirect()->route('admin.crew.index')
            ->with('success', 'Membre d\'équipage créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CrewMember $crew)
    {
        $this->authorize('crew.view');

        return view('admin.crew.show', compact('crew'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CrewMember $crew)
    {
        $this->authorize('crew.edit');

        return view('admin.crew.edit', compact('crew'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CrewMember $crew)
    {
        $this->authorize('crew.edit');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role_fr' => 'required|string|max:255',
            'role_en' => 'required|string|max:255',
            'bio_fr' => 'required|string',
            'bio_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists in storage
            if ($crew->image && str_starts_with($crew->image, '/storage/')) {
                $oldImagePath = str_replace('/storage/', '', $crew->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            // Upload new image
            $imagePath = $request->file('image')->store('crew', 'public');
            $validated['image'] = '/storage/' . $imagePath;
        } else {
            // Keep existing image
            unset($validated['image']);
        }

        $crew->update($validated);

        return redirect()->route('admin.crew.index')
            ->with('success', 'Membre d\'équipage mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CrewMember $crew)
    {
        $this->authorize('crew.delete');

        // Delete image if it exists in storage
        if ($crew->image && str_starts_with($crew->image, '/storage/')) {
            $imagePath = str_replace('/storage/', '', $crew->image);
            Storage::disk('public')->delete($imagePath);
        }

        $crew->delete();

        return redirect()->route('admin.crew.index')
            ->with('success', 'Membre d\'équipage supprimé avec succès.');
    }
}
