<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerer extends Model {
    use HasFactory;

    protected $table = 'gerer'; 
    protected $primaryKey = null; 
    public $incrementing = false; 
    protected $fillable = ['numTentative', 'id'];
    public $timestamps = false;

    // Relation avec TempElecteur
    public function tempElecteur() {
        return $this->belongsTo(TempElecteur::class, 'numTentative', 'numTentative');
    }

    // Relation avec AgentDGE
    public function agentDGE() {
        return $this->belongsTo(AgentDGE::class, 'id', 'id');
    }
}
