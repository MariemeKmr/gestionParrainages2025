<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\Parrainage;
use App\Models\Electeur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\SendCode;

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

    // Vérifier si l'électeur a déjà parrainé un candidat
    if (Parrainage::where('electeur_id', $electeur->id)->where('statut','validé')->exists()) {
        return redirect()->route('parrainage')->with('error', 'Vous avez déjà parrainé un candidat.');
    }

    // Vérifier si le candidat existe
    \Log::debug('Recherche du candidat avec ID: ' . $candidatId);
    $candidat = Candidat::find($candidatId);

    if ($candidat) {
        \Log::debug('Candidat trouvé: ' . $candidat->nom);

        // Générer un code d'authentification
        $codeVerification = Str::random(10);

        // Créer un nouveau parrainage
        Parrainage::create([
            'candidat_id' => $candidat->id,
            'electeur_id' => $electeur->id,
            'code_verification' => $codeVerification,
        ]);

        // Envoyer un email avec le code de vérification
        Mail::to($electeur->adresse_email)->send(new SendCode($electeur, $codeVerification));

        return redirect()->route('parrainage.verify.form', ['candidatId' => $candidat->id])
    ->with('success', 'Parrainage créé avec succès. Veuillez vérifier votre email pour le code de vérification.'); }

    \Log::debug('Candidat non trouvé avec ID: ' . $candidatId);
    return redirect()->route('parrainage')->with('error', 'Candidat non trouvé.');
}
    public function showVerificationForm($candidatId)
    {
        return view('electeur.verify_code', compact('candidatId'));
    }


    public function verifyCode(Request $request, $candidatId)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
    
        // Récupérer l'électeur associé à l'utilisateur connecté
        $electeur = $user->electeur;
    
        $request->validate([
            'code_verification' => 'required|string|max:10',
        ]);
    
        // Vérifier le code d'authentification
        $parrainage = Parrainage::where('electeur_id', $electeur->id)
            ->where('candidat_id', $candidatId)
            ->where('code_verification', $request->code_verification)
            ->where('statut', 'en_attente')
            ->first();
    
        if ($parrainage) {
            // Code vérifié avec succès
            $parrainage->update(['code_verification' => null, 'statut' => 'validé']);
    
            // Incrémenter le nombre de parrainages pour le candidat
            $candidat = Candidat::find($parrainage->candidat_id);
            if ($candidat) {
                $candidat->increment('nombre_parrainages');
            }
            \Log::debug('Parrainage trouvé : ', ['parrainage' => $parrainage]);
            \Log::debug('Candidat trouvé : ', ['candidat' => $candidat]);
    
            return redirect()->route('parrainage')->with('success', 'Parrainage enregistré avec succès.');
        }
    
        return redirect()->route('parrainage.verify.form', ['candidatId' => $candidatId])
            ->with('error', 'Code de vérification incorrect.');
    }
}