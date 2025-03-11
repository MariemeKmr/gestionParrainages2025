<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ParrainageController;

Route::get('/', function () {
    return view('public.welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/otp-verfication', function () {
    return view('auth.otp_register');
})->name('otp_register');

Route::get('/candidatDashboard', function () {
    return view('candidat.dashboard');
});

Route::get('/electeurDashboard', function () {
    return view('electeur.dashboard');
});

Route::get('/contentDashboard', function () {
    return view('layout.dashboard');
});

Route::get('/contact', function () {
    return view('public.contact');
});

Route::get('/profil', [UserController::class, 'showProfile'])->name('profil');
Route::get('/messages', [MessageController::class, 'index'])->name('message');
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
