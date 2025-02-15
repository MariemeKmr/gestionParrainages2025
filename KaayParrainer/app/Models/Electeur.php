<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electeur extends Model {
    use HasFactory;

    protected $table = 'electeurs';
    protected $primaryKey = 'numeroCarteElecteur';
    public $incrementing = false;
    protected $fillable = ['numeroCarteIdentite', 'nom', 'prenom', 'numeroBureauVote', 'dateNaissance', 'lieuNaissance', 'sexe', 'telephone'];

    public function compte() {
        return $this->belongsTo(CompteElecteur::class, 'telephone', 'telephone');}
}