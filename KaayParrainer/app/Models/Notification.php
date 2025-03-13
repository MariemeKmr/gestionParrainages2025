<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidat_id', // ID du candidat auquel la notification est associée
        'message',     // Contenu du message de notification
        'type',        // Type de notification
        'read_at',     // Date de lecture de la notification (nullable)
    ];

    /**
     * Relation inverse vers le modèle Candidat
     */
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
