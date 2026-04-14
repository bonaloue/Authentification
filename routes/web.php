<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
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

    // Mot de passe oublié
    Route::get('/password/forgot', [PasswordController::class, 'showForgotPasswordForm'])->name('password.forgot');
    Route::post('/password/forgot', [PasswordController::class, 'sendResetLinkEmail'])->name('password.forgot.post');
    Route::get('/password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [PasswordController::class, 'reset'])->name('password.reset.post');
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

    // Changement de mot de passe
    Route::get('/password/change', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/password/change', [PasswordController::class, 'change'])->name('password.change.post');

    // Déconnexion (doit être en POST pour la sécurité CSRF)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});