<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Avi;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    public function index()
    {
        $avis = Avi::all();
        return view('gestion.avis.index', compact('avis'));
    }

    public function create()
    {
        return view('gestion.avis.create');
    }

    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avis' => 'required|string',
            'note' => 'required|numeric|min:1|max:5',
            'valide' => 'boolean',
        ]);
    
        // Création d'un nouvel avis
        $avis = new Avi([
            'nom' => $request->input('nom'),
            'email' => $request->input('email'),
            'avis' => $request->input('avis'),
            'note' => $request->input('note'),
            'valide' => $request->input('valide', false),
        ]);
    
        // Enregistrement dans la base de données
        $avis->save();
    
        // Redirection avec un message de succès
        return redirect()->route('admin.avis.index')->with('success', 'Avis ajouté avec succès.');
    }

    public function show($id)
{
    $avi = Avi::findOrFail($id);
    return view('gestion.avis.show', compact('avi'));
}


public function edit($id)
{
    $avi = Avi::findOrFail($id);
    return view('gestion.avis.edit', compact('avi'));
}
    public function update(Request $request, $id)
    {
        // Validation des champs
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avis' => 'required|string',
            'note' => 'required|numeric|min:1|max:5',  // Utilisation de la même validation que dans store
            'valide' => 'required|boolean',
        ]);

        Avi::where('id', $id)->update($validated);

        return redirect()->route('admin.avis.index')->with('success', 'Avis mis à jour avec succès.');
    }

    public function destroy($id)
    {
        Avi::destroy($id);
        return redirect()->route('admin.avis.index')->with('success', 'Avis supprimé avec succès.');
    }
}
