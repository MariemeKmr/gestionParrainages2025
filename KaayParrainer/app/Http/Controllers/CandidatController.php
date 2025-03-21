<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Notification;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailCandidat;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PasswordChangedNotification;
use Carbon\Carbon;

class CandidatController extends Controller
{
    public function showDashboard()
    {
        return view('dge.dashboard');
    }
    public function show($id)
    {
        $candidat = Candidat::findOrFail($id);
        return view('dge.candidats.show', compact('candidat'));
    }
    public function index()
    {
        $candidats = Candidat::all();
        return view('dge.candidats.index', compact('candidats'));
    }
    public function showLoginForm()
    {
        return view('candidats.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'candidat') {
                return redirect()->intended('/candidat/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Vous n\'êtes pas autorisé à accéder à cette section.']);
            }
        }

        return back()->withErrors(['email' => 'Les informations d\'identification ne correspondent pas.']);
    }


    public function listeCandidats()
    {
        $candidats = Candidat::all();
        return view('public.listeCandidats', compact('candidats'));
    }

    public function create()
    {
        return view('candidat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse_email' => 'required|email|unique:candidats,adresse_email',
            'numero_telephone' => 'required|numeric|unique:candidats,numero_telephone',
            'parti_politique' => 'nullable|string',
            'slogan' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'couleur1' => 'required|string',
            'couleur2' => 'required|string',
            'couleur3' => 'required|string',
            'url_info' => 'nullable|string',
        ]);

        $password = Str::random(12);

        $user = User::create([
            'name' => $request->nom . ' ' . $request->prenom,
            'email' => $request->adresse_email,
            'password' => Hash::make($password),
            'role' => 'candidat'
        ]);

        // Gérer l'upload de la photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Créer le candidat
        $candidat = Candidat::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse_email' => $request->adresse_email,
            'numero_telephone' => $request->numero_telephone,
            'parti_politique' => $request->parti_politique,
            'slogan' => $request->slogan,
            'photo' => $photoPath,
            'trois_couleurs_parti' => json_encode([$request->couleur1, $request->couleur2, $request->couleur3]),
            'url_page_infos' => $request->url_info,
            'user_id' => $user->id,
            'numero_carte_electeur' => Str::uuid()
        ]);

        // Envoi d'email avec mot de passe généré
        Mail::to($candidat->adresse_email)->send(new MailCandidat($candidat, $password));

        return redirect()->route('dashboard.dge')->with('success', 'Candidat créé avec succès.');
    }

    public function edit(Candidat $candidat)
    {
        return view('candidats.edit', compact('candidat'));
    }

    public function update(Request $request, Candidat $candidat)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse_email' => 'required|email|unique:candidats,adresse_email,' . $candidat->id,
            'numero_telephone' => 'required|numeric|unique:candidats,numero_telephone,' . $candidat->id,
            'parti_politique' => 'nullable|string',
            'slogan' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'couleur1' => 'required|string',
            'couleur2' => 'required|string',
            'couleur3' => 'required|string',
            'url_info' => 'nullable|string',
        ]);

        // Gérer l'upload de la photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $candidat->photo = $photoPath;
        }

        // Mettre à jour le candidat
        $candidat->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse_email' => $request->adresse_email,
            'numero_telephone' => $request->numero_telephone,
            'parti_politique' => $request->parti_politique,
            'slogan' => $request->slogan,
            'trois_couleurs_parti' => json_encode([$request->couleur1, $request->couleur2, $request->couleur3]),
            'url_page_infos' => $request->url_info,
        ]);

        // Si un mot de passe a été fourni et qu'il doit être mis à jour
        if ($request->has('password') && !empty($request->password)) {
            $candidat->user->password = Hash::make($request->password);
            $candidat->user->save();

            // Envoi de la notification pour le changement de mot de passe
            $candidat->user->notify(new PasswordChangedNotification($candidat->nom));

            // Enregistrer la notification dans la table "notifications"
            Notification::create([
                'candidat_id' => $candidat->id,
                'message' => 'Votre mot de passe a été modifié.',
                'type' => 'password_changed',
                'read_at' => null, // Notification non lue
            ]);
        }

        return redirect()->route('dashboard.dge')->with('success', 'Candidat mis à jour avec succès.');
    }

    public function destroy(Candidat $candidat)
    {
        $candidat->delete();

        return redirect()->route('dashboard.dge')->with('success', 'Candidat supprimé avec succès.');
    }

    // Nouvelle méthode pour compter les messages hebdomadaires
    public function countWeeklyMessages(Candidat $candidat)
    {
        // Calculer la date de début de la semaine (par exemple, dimanche dernier)
        $startOfWeek = Carbon::now()->startOfWeek();

        // Compter les messages reçus par le candidat cette semaine
        $messageCount = Message::where('candidat_id', $candidat->id)
                               ->where('created_at', '>=', $startOfWeek)
                               ->count();

        // Enregistrer la notification dans la base de données
        Notification::create([
            'candidat_id' => $candidat->id,
            'message' => "Vous avez reçu $messageCount messages cette semaine.",
            'type' => 'weekly_message_count',
            'read_at' => null, // Notification non lue
        ]);

        // Retourner la vue du dashboard avec le nombre de messages
        return view('candidats.dashboard', compact('messageCount'));
    }
}
