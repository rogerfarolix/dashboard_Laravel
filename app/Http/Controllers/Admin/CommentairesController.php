<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actualite;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentairesController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::with('actualite')->get();
        return view('gestion.commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        $actualites = Actualite::all();
        return view('gestion.commentaires.create', compact('actualites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'actualite_id' => 'required|exists:actualites,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $commentaire = new Commentaire();
        $commentaire->actualite_id = $request->actualite_id;
        $commentaire->nom = $request->nom;
        $commentaire->email = $request->email;
        $commentaire->message = $request->message;
        $commentaire->save();

        return redirect()->route('admin.commentaires.index')->with('success', 'Commentaire ajouté avec succès.');
    }

    public function show(Commentaire $commentaire)
    {
        return view('gestion.commentaires.show', compact('commentaire'));
    }

    public function edit(Commentaire $commentaire)
    {
        $actualites = Actualite::all();
        return view('gestion.commentaires.edit', compact('commentaire', 'actualites'));
    }

    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            'actualite_id' => 'required|exists:actualites,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $commentaire->actualite_id = $request->actualite_id;
        $commentaire->nom = $request->nom;
        $commentaire->email = $request->email;
        $commentaire->message = $request->message;
        $commentaire->save();

        return redirect()->route('admin.commentaires.index')->with('success', 'Commentaire mis à jour avec succès.');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('admin.commentaires.index')->with('success', 'Commentaire supprimé avec succès.');
    }
}
