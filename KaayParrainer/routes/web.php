<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ParrainageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.PageConnexion');
})->name('login');

Route::get('/register', function () {
    return view('auth.PageInscription');
})->name('register');

Route::get('/CandidatDashboard', function () {
    return view('Utilisateurs.Candidat.CandidatDashboard');
});

Route::get('/ElecteurDashboard', function () {
    return view('Utilisateurs.Electeur.ElecteursDashboard');
});

Route::get('/ContentDashboard', function () {
    return view('Utilisateurs.ContentDashboard');
});

Route::get('/Contact', function () {
    return view('Utilisateurs.Contact');
});

Route::get('/profil', [UserController::class, 'showProfile'])->name('userProfile');

// Ajout des routes pour les messages
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

Route::get('/parrainage', [ParrainageController::class, 'parrainer'])->name('parrainage');
Route::get('/Statistiques', [StatistiqueController::class, 'index'])->name('statistiques');

Route::middleware('auth')->group(function () {
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});
