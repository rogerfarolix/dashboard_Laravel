<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VieUniversitaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VieuniversitairesController extends Controller
{
    public function index()
    {
        $vieuniversitaires = VieUniversitaire::all();
        return view('gestion.vieuniversitaires.index', compact('vieuniversitaires'));
    }

    public function create()
    {
        return view('gestion.vieuniversitaires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:Clubs Artistiques et Culturels,Clubs des Hôtes et Langues,Événements & Célébrations,Travaux pratiques',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable|string', // Validation du champ description
        ]);

        $imagePath = $request->file('image')->store('vieuniversitaires', 'public');

        VieUniversitaire::create([
            'type' => $request->type,
            'image' => $imagePath,
            'description' => $request->description, // Ajout de la description
        ]);

        return redirect()->route('admin.vieuniversitaires.index')->with('success', 'Contenu ajouté avec succès.');
    }

    public function edit(VieUniversitaire $vieuniversitaire)
    {
        return view('gestion.vieuniversitaires.edit', compact('vieuniversitaire'));
    }

    public function update(Request $request, VieUniversitaire $vieuniversitaire)
    {
        $request->validate([
            'type' => 'required|string|in:Clubs Artistiques et Culturels,Clubs des Hôtes et Langues,Événements & Célébrations,Travaux pratiques',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable|string', // Validation du champ description
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($vieuniversitaire->image);
            $imagePath = $request->file('image')->store('vieuniversitaires', 'public');
            $vieuniversitaire->image = $imagePath;
        }

        $vieuniversitaire->type = $request->type;
        $vieuniversitaire->description = $request->description; // Mise à jour de la description
        $vieuniversitaire->save();

        return redirect()->route('admin.vieuniversitaires.index')->with('success', 'Contenu mis à jour avec succès.');
    }

    public function destroy(VieUniversitaire $vieuniversitaire)
    {
        Storage::disk('public')->delete($vieuniversitaire->image);
        $vieuniversitaire->delete();
        return redirect()->route('admin.vieuniversitaires.index')->with('success', 'Contenu supprimé avec succès.');
    }
}
