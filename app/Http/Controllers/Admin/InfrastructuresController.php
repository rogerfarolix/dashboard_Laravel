<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfrastructuresController extends Controller
{
    public function index()
    {
        $infrastructures = Infrastructure::all();
        return view('gestion.infrastructures.index', compact('infrastructures'));
    }

    public function create()
    {
        return view('gestion.infrastructures.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|in:equipements,batiments',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:12048',
            'description' => 'nullable|string', // Validation pour description
        ]);
    
        $path = $request->file('image')->store('infrastructures', 'public');
    
        Infrastructure::create([
            'type' => $request->type,
            'image' => $path,
            'description' => $request->description, // Enregistrement de la description
        ]);
    
        return redirect()->route('admin.infrastructures.index')->with('success', 'Infrastructure ajoutée avec succès');
    }
    

    public function show(Infrastructure $infrastructure)
    {
        return view('gestion.infrastructures.show', compact('infrastructure'));
    }

    public function edit(Infrastructure $infrastructure)
    {
        return view('gestion.infrastructures.edit', compact('infrastructure'));
    }

    public function update(Request $request, Infrastructure $infrastructure)
    {
        $validatedData = $request->validate([
            'type' => 'required|in:equipements,batiments',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:12048',
            'description' => 'nullable|string', // Validation pour description
        ]);
    
        $updateData = [
            'type' => $request->type,
            'description' => $request->description, // Mise à jour de la description
        ];
    
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($infrastructure->image);
            $path = $request->file('image')->store('infrastructures', 'public');
            $updateData['image'] = $path;
        }
    
        $infrastructure->update($updateData);
    
        return redirect()->route('admin.infrastructures.index')->with('success', 'Infrastructure mise à jour avec succès');
    }
    

    public function destroy(Infrastructure $infrastructure)
    {
        Storage::disk('public')->delete($infrastructure->image);
        $infrastructure->delete();
        return redirect()->route('admin.infrastructures.index')->with('success', 'Infrastructure supprimée avec succès');
    }
}
