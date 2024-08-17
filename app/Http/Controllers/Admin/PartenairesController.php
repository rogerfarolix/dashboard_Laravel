<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partenaire;
use Illuminate\Support\Facades\Storage;

class PartenairesController extends Controller
{
    public function index()
    {
        $partenaires = Partenaire::all();
        return view('gestion.partenaires.index', compact('partenaires'));
    }

    public function create()
    {
        return view('gestion.partenaires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partenaires', 'public');
        }

        Partenaire::create([
            'nom' => $request->input('nom'),
            'logo' => $logoPath,
        ]);

        return redirect()->route('admin.partenaires.index')->with('success', 'Partenaire ajouté avec succès');
    }

    public function edit($id)
    {
        $partenaire = Partenaire::findOrFail($id);
        return view('gestion.partenaires.edit', compact('partenaire'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $partenaire = Partenaire::findOrFail($id);

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($partenaire->logo) {
                Storage::disk('public')->delete($partenaire->logo);
            }
            $logoPath = $request->file('logo')->store('partenaires', 'public');
            $partenaire->logo = $logoPath;
        }

        $partenaire->nom = $request->input('nom');
        $partenaire->save();

        return redirect()->route('admin.partenaires.index')->with('success', 'Partenaire mis à jour avec succès');
    }

    public function destroy($id)
    {
        $partenaire = Partenaire::findOrFail($id);
        if ($partenaire->logo) {
            Storage::disk('public')->delete($partenaire->logo);
        }
        $partenaire->delete();
        return redirect()->route('admin.partenaires.index')->with('success', 'Partenaire supprimé avec succès');
    }
}
