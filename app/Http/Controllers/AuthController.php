<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/dashboard'); // Redirige vers le tableau de bord après connexion
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification ne correspondent pas.',
        ]);
    }


        // Affiche la vue pour modifier le profil
        public function showProfileForm()
        {
            $admin = Auth::user();
            return view('gestion.profile', compact('admin'));
        }
    
        // Met à jour le profil de l'admin
        public function updateProfile(Request $request)
        {
            $admin = Auth::user();
    
            // Valide les données du formulaire
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $admin->id,
                'password' => 'nullable|min:8|confirmed',
            ]);
    
            // Met à jour les informations de l'admin
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            if ($request->filled('password')) {
                $admin->password = Hash::make($request->input('password'));
            }
            $admin->save();
    
            return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
        }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
