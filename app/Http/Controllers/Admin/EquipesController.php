<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipes = Equipe::all();
        return view('gestion.equipes.index', compact('equipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gestion.equipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:12048',
            'nom' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        // Enregistrement de l'image
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images/equipes', 'public');
            $validatedData['photo'] = $path;
        }

        // Création de l'équipe
        Equipe::create($validatedData);

        return redirect()->route('admin.equipes.index')->with('success', 'Équipe ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipe $equipe)
    {
        return view('gestion.equipes.show', compact('equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipe $equipe)
    {
        return view('gestion.equipes.edit', compact('equipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipe $equipe)
    {
        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:12048',
            'nom' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        // Gestion de l'image
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($equipe->photo) {
                Storage::disk('public')->delete($equipe->photo);
            }

            // Enregistrer la nouvelle photo
            $path = $request->file('photo')->store('images/equipes', 'public');
            $validatedData['photo'] = $path;
        }

        // Mise à jour des autres informations
        $equipe->update($validatedData);

        return redirect()->route('admin.equipes.index')->with('success', 'Équipe mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipe $equipe)
    {
        // Supprimer la photo associée si elle existe
        if ($equipe->photo) {
            Storage::disk('public')->delete($equipe->photo);
        }

        $equipe->delete();

        return redirect()->route('admin.equipes.index')->with('success', 'Équipe supprimée avec succès');
    }
}
