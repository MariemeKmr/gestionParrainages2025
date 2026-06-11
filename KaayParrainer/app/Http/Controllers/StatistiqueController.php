<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\Electeur;
use App\Models\Parrainage;

class StatistiqueController extends Controller
{
    public function index(Request $request)
    {
        // Compter le nombre total d'électeurs
        $totalElecteurs = Electeur::count();

        // Compter le nombre total de parrainages
        $totalParrainages = Parrainage::count();

        // Calculer le taux de participation
        $tauxParticipation = ($totalElecteurs > 0) ? ($totalParrainages / $totalElecteurs) * 100 : 0;

        // Données pour le graphique des parrainages par parti politique
        $candidats = Candidat::all();
        $labels = $candidats->pluck('parti_politique')->toArray();
        $parrainagesData = [];

        foreach ($candidats as $candidat) {
            $parrainagesData[] = Parrainage::where('candidat_id', $candidat->id)->count();
        }

        return view('public.statistique', compact('totalElecteurs', 'totalParrainages', 'tauxParticipation', 'labels', 'parrainagesData'));
    }
}
