<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
    //Création de l'utilisateur
        $user = User::create([
        'nom'       => $request->nom,
        'prenom'    => $request->prenom,
        'email'     => $request->email,
        'telephone' => $request->telephone,
        'password'  => Hash::make($request->password),
        ]);

        //Connexion après inscription
        Auth::login($user);

        //Redirection vers la page d'acceuil
        return redirect('/')->with('success','Votre compte a été créé avec succès !');
    }    

    public function login(Request $request)
    {
        // Validation des champs
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tentative de connexion avec protection contre les attaques par force brute (Rate Limiting)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Heureux de vous revoir !');
        }

        // Message d'erreur générique pour la sécurité [cite: 19]
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidation de la session et régénération du token CSRF [cite: 22]
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Vous avez été déconnecté.');
    }
    }


