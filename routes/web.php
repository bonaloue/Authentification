<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- ROUTES POUR LES VISITEURS (NON CONNECTÉS) ---
Route::middleware('guest')->group(function () {
    
    // Inscription
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Connexion
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login']); // AJOUTÉ : Pour traiter le formulaire
});

// --- ROUTES POUR LES UTILISATEURS CONNECTÉS ---
Route::middleware('auth')->group(function () {
    
    // Page d'accueil (Profil)
    Route::get('/', [ProfileController::class, 'index'])->name('home');
    
    // Modification des informations textuelles
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
    
    // Gestion spécifique de l'avatar
    Route::post('/profil/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');

    // Déconnexion (doit être en POST pour la sécurité CSRF)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});