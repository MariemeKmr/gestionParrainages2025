<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Ces champs sont autorisés à être remplis via un formulaire (mass-assignment)
    protected $fillable = ['user_id', 'content'];

    // Relation avec l'utilisateur (un message appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
