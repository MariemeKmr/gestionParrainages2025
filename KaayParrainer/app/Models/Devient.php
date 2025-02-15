<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devient extends Model {
    use HasFactory;

    protected $table = 'devient';
    public $incrementing = false;  // Clé primaire composite
    public $timestamps = false;
    
    protected $fillable = ['numeroCarteElecteur', 'numTentative'];

    public function electeur() {
        return $this->belongsTo(Electeur::class, 'numeroCarteElecteur', 'numeroCarteElecteur');
    }

    public function tempElecteur() {
        return $this->belongsTo(TempElecteur::class, 'numTentative', 'numTentative');
}
}
