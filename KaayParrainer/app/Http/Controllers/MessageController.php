<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;  // Assure-toi d'avoir importé le modèle Message

class MessageController extends Controller
{
    // Afficher les messages
    public function index()
    {
        // Récupérer tous les messages et les trier par date de création
        $messages = Message::latest()->get();  // Tri par date (du plus récent au plus ancien)
        
        // Retourner la vue avec la liste des messages
        return view('Utilisateurs.message', compact('messages'));
    }

    // Enregistrer un nouveau message
    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'message' => 'required|string|max:255',  // Assurez-vous que le champ 'message' est bien envoyé
        ]);

        // Créer un nouveau message dans la base de données
        Message::create([
            'user_id' => auth()->id(),  // Récupérer l'ID de l'utilisateur connecté
            'content' => $request->message,  // Insérer le contenu du message dans le champ 'content'
        ]);

        // Rediriger vers la page des messages avec un message de succès
        return redirect()->route('messages.index')->with('success', 'Message envoyé avec succès!');
    }
}
