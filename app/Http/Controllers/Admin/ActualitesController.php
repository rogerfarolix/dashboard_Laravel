<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ActualitesController extends Controller
{
    public function index()
    {
        $actualites = Actualite::with('categorie')->get();
        return view('gestion.actualites.index', compact('actualites'));
    }

    public function create()
    {
        $categories = categorie::all();
        return view('gestion.actualites.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categorie_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'titre' => 'required|string|max:255',
            'description1' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description2' => 'nullable|string',
        ]);

        $actualite = new Actualite();
        $actualite->categorie_id = $request->categorie_id;
        $actualite->date = $request->date;
        $actualite->titre = $request->titre;
        $actualite->description1 = $request->description1;

        if ($request->hasFile('image1')) {
            $actualite->image1 = $request->file('image1')->store('images/actualites', 'public');
        }

        if ($request->hasFile('image2')) {
            $actualite->image2 = $request->file('image2')->store('images/actualites', 'public');
        }

        if ($request->hasFile('image3')) {
            $actualite->image3 = $request->file('image3')->store('images/actualites', 'public');
        }

        $actualite->description2 = $request->description2;
        $actualite->save();

        return redirect()->route('admin.actualites.index')->with('success', 'Actualité ajoutée avec succès.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Actualite $actualite)
    {
        $categories = categorie::all();
        return view('gestion.actualites.show', compact('actualite', 'categories'));
    }
    /**ggghhg
     * Show the form for editing the specified resource.
     */
    public function edit(Actualite $actualite)
    {
        $categories = categorie::all();
        return view('gestion.actualites.edit', compact('actualite', 'categories'));
    }

    public function update(Request $request, Actualite $actualite)
    {
        $request->validate([
            'categorie_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'titre' => 'required|string|max:255',
            'description1' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description2' => 'nullable|string',
        ]);

        $actualite->categorie_id = $request->categorie_id;
        $actualite->date = $request->date;
        $actualite->titre = $request->titre;
        $actualite->description1 = $request->description1;

        if ($request->hasFile('image1')) {
            $actualite->image1 = $request->file('image1')->store('images/actualites', 'public');
        }

        if ($request->hasFile('image2')) {
            $actualite->image2 = $request->file('image2')->store('images/actualites', 'public');
        }

        if ($request->hasFile('image3')) {
            $actualite->image3 = $request->file('image3')->store('images/actualites', 'public');
        }

        $actualite->description2 = $request->description2;
        $actualite->save();

        return redirect()->route('admin.actualites.index')->with('success', 'Actualité mise à jour avec succès.');
    }

    public function destroy(Actualite $actualite)
    {
        $actualite->delete();
        return redirect()->route('admin.actualites.index')->with('success', 'Actualité supprimée avec succès.');
    }
}
