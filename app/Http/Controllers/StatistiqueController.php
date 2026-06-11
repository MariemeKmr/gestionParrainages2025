<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\Electeur;
use App\Models\Parrainage;
use App\Models\CompteElecteur;

class StatistiqueController extends Controller
{
    public function index(Request $request)
    {
        // Statistiques générales
        $totalElecteurs = Electeur::count();
        $totalParrainages = Parrainage::where('statut', true)->count();
        $tauxParticipation = $totalElecteurs > 0 ? ($totalParrainages / $totalElecteurs) * 100 : 0;
        // Statistiques par candidat
        $parrainagesParCandidat = Candidat::withCount(['parrainages' => function ($query) {
            $query->where('statut', true);
        }])->get()->pluck('parrainages_count', 'nom')->toArray(); // Convertir en tableau associatif
    
        // Recherche d'un candidat spécifique
        $candidat = [];
        if ($request->has('search') && $request->search != '') {
            $candidat = Candidat::where('nomPartiPolitique', 'LIKE', "%{$request->search}%")
                ->orWhere('numCarteElecteur', 'LIKE', "%{$request->search}%")
                ->first();
        }

        return view('candidats.statistiques', compact('totalElecteurs', 'totalParrainages', 'tauxParticipation', 'candidat','parrainagesParCandidat'));
    }
    public function showStatistiquesElecteur()
    {
        $totalElecteurs = Electeur::count();
        $totalParrainages = Parrainage::where('statut', true)->count();
        $tauxParticipation = $totalElecteurs > 0 ? ($totalParrainages / $totalElecteurs) * 100 : 0;

        return view('public.statistique', compact('totalElecteurs', 'totalParrainages', 'tauxParticipation'));
    }
        // Afficher la vue avec les statistiques
    }
    