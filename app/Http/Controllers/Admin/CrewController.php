<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CrewMember;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

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
            'image' => 'required|string|max:255',
        ]);

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
            'image' => 'required|string|max:255',
        ]);

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

        $crew->delete();

        return redirect()->route('admin.crew.index')
            ->with('success', 'Membre d\'équipage supprimé avec succès.');
    }
}
