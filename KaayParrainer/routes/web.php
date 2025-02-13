<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/CandidatDashboard', function () {
    return view('UserDashboard.Candidats');
});

Route::get('/ElecteurDashboard', function () {
    return view('UserDashboard.Electeurs');
});


// <?php

// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
// use App\Models\candidat;

// Route::get('/', function () {
//     return view('welcome');
// });

// // Dashboard Candidat avec données utilisateur
// Route::get('/CandidatDashboard', function () {
//     $user = Auth::user(); // Récupérer l'utilisateur connecté
//     return view('UserDashboard.Candidats', compact('user'));
// })->middleware('auth'); // Protéger la route

// // Dashboard Électeur avec données utilisateur
// Route::get('/ElecteurDashboard', function () {
//     $user = Auth::user();
//     return view('UserDashboard.Electeurs', compact('user'));
// })->middleware('auth');
