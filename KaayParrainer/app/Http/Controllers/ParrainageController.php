<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\Parrainage;
use App\Models\Electeur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ParrainageController extends Controller
{
    public function index()
    {
        $candidats = Candidat::all();
        return view('electeur.parrainer', compact('candidats'));
    }

    public function parrainer(Request $request, $candidatId)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur a un électeur associé
        if (!$user->electeur) {
            return redirect()->route('parrainage')->with('error', 'Vous devez être un électeur pour parrainer un candidat.');
        }

        // Récupérer l'électeur associé à l'utilisateur connecté
        $electeur = $user->electeur;

        // Vérifier si le candidat existe
        $candidat = Candidat::find($candidatId);

        if ($candidat) {
            // Générer un code d'authentification
            $codeVerification = Str::random(10);

            // Enregistrer l'action de parrainage dans la base de données
            $parrainage = Parrainage::create([
                'electeur_id' => $electeur->id,
                'candidat_id' => $candidat->id,
                'code_verification' => $codeVerification,
            ]);

            // Envoyer le code d'authentification par email
            Mail::to($electeur->adresse_email)->send(new \App\Mail\SendCode($electeur, $codeVerification));

            // Envoyer le code d'authentification par SMS (à implémenter)
            // Vous pouvez utiliser un service comme Twilio pour envoyer des SMS

            return redirect()->route('parrainage.verify.form')->with('success', 'Un code d\'authentification a été envoyé à votre email et téléphone.');
        }

        return redirect()->route('parrainage')->with('error', 'Candidat non trouvé.');
    }

    public function incrementParrainage($candidatId)
    {
        $candidat = Candidat::find($candidatId);

        if ($candidat) {
            $candidat->increment('nombre_parrainages');
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function showVerificationForm()
    {
        return view('electeur.verify_code');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code_verification' => 'required|string',
        ]);

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur a un électeur associé
        if (!$user->electeur) {
            return redirect()->route('parrainage')->with('error', 'Vous devez être un électeur pour vérifier un code.');
        }

        // Récupérer l'électeur associé à l'utilisateur connecté
        $electeur = $user->electeur;

        // Vérifier le code d'authentification
        $parrainage = Parrainage::where('electeur_id', $electeur->id)
            ->where('code_verification', $request->code_verification)
            ->first();

        if ($parrainage) {
            // Code vérifié avec succès
            $parrainage->update(['code_verification' => null]);

            return redirect()->route('parrainage')->with('success', 'Parrainage enregistré avec succès.');
        }

        return back()->withErrors(['code_verification' => 'Code d\'authentification incorrect.']);
    }
}