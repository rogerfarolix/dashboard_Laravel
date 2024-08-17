<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriesController extends Controller
{
    public function index()
    {
        $galeries = Galerie::all();
        return view('gestion.galeries.index', compact('galeries'));
    }


    public function create()
    {
        return view('gestion.galeries.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('galeries', 'public');

        Galerie::create([
            'image' => $path,
        ]);

        return redirect()->route('admin.galeries.index')->with('success', 'Image ajoutée avec succès.');
    }

    public function edit(Galerie $galerie)
    {
        return view('gestion.galeries.edit', compact('galerie'));
    }

    public function update(Request $request, Galerie $galerie)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $updateData = [];

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($galerie->image) {
                Storage::disk('public')->delete($galerie->image);
            }
            $path = $request->file('image')->store('galeries', 'public');
            $updateData['image'] = $path;
        }

        $galerie->update($updateData);

        return redirect()->route('admin.galeries.index')->with('success', 'Image mise à jour avec succès.');
    }

    public function destroy(Galerie $galerie)
    {
        // Supprimer l'image du stockage
        if ($galerie->image) {
            Storage::disk('public')->delete($galerie->image);
        }

        // Supprimer l'enregistrement de la base de données
        $galerie->delete();

        return redirect()->route('admin.galeries.index')->with('success', 'Image supprimée avec succès.');
    }
}
