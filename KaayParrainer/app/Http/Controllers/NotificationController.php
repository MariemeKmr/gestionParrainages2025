<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Affiche la liste paginée des notifications.
     */
    public function index()
    {
        // Récupère les notifications les plus récentes avec une pagination de 10 par page
        $notifications = Notification::latest()->paginate(10);
        return view('Utilisateurs.messages', compact('notifications'));
    }

    /**
     * Marque toutes les notifications comme lues.
     */
    public function markAllAsRead(Request $request)
    {
        // Ici, on met à jour toutes les notifications pour indiquer qu'elles ont été lues.
        // Attention, en production, il est préférable de cibler les notifications de l'utilisateur connecté.
        Notification::query()->update(['read_at' => now()]);

        return redirect()->back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
    }
}
