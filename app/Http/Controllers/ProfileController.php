<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Affiche la page d'accueil avec les informations du profil.
     */
    public function index()
    {
        return view('home', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Affiche le formulaire de modification des informations personnelles.
     */
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Traite la mise à jour des informations textuelles.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'telephone' => 'required|string|max:20',
        ]);

        // Mise à jour sécurisée
        $user->update($request->only('nom', 'prenom', 'email', 'telephone'));

        return redirect()->route('home')->with('success', 'Votre profil a été mis à jour avec succès !');
    }

    /**
     * Gère l'upload et le remplacement de la photo de profil.
     */
    public function updateAvatar(Request $request)
    {
        // Validation stricte du fichier (2Mo max, formats spécifiques)
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        /** @var User $user */
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            // 1. Supprimer l'ancienne photo du disque si elle existe
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // 2. Stocker la nouvelle photo dans le dossier 'avatars' du disque public
            $path = $request->file('avatar')->store('avatars', 'public');

            // 3. Enregistrer le chemin dans la base de données
            $user->update([
                'avatar' => $path
            ]);
        }

        return back()->with('success', 'Votre photo de profil a été modifiée.');
    }
}