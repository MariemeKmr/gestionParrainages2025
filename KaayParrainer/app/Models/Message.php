<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidat_id', // ID du candidat qui reçoit le message
        'contenu',     // Contenu du message
        'created_at',  // Date de création du message
    ];

    /**
     * Relation avec le modèle Candidat
     */
    public function candidat(): BelongsTo
    {
        return $this->belongsTo(Candidat::class);
    }
}
