<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;

class ParrainageController extends Controller
{
    public function index()
    {
        $candidats = Candidat::all();
        return view('electeur.parrainer', compact('candidats'));
    }

    public function parrainer($numCarteElecteur)
    {
        // Logique pour parrainer un candidat
        $candidat = Candidat::find($numCarteElecteur);

        if ($candidat) {
            // Ajoutez ici la logique pour parrainer le candidat
            // Par exemple, enregistrez l'action de parrainage dans la base de données

            return redirect()->route('parrainage')->with('success', 'Candidat parrainé avec succès.');
        }

        return redirect()->route('parrainage')->with('error', 'Candidat non trouvé.');
    }
}
